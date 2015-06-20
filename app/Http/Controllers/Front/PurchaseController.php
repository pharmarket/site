<?php
namespace App\Http\Controllers\Front;
	use \Auth 					as Auth;
	use \DB 						as DB;
	use \Lang 					as Lang;
	use \App\Devise 		as Devise;
	use \Session 				as Session;
	use \App\Pays 			as Pays;
	use \Validator 			as Validator;
	use \Request 				as Request;
	use \Cart						as Cart;
	use \App\Livreur 		as Livreur;
	use \App\Library\Paypal as Paypal;
	use \App\Commande		as Commande;
	use \Config					as Config;
	use \App\Library\MYPDF as MYPDF;
	use \Mail 					as Mail;
	use \Exception 			as Exception;
	use \Redirect 			as Redirect;


class PurchaseController extends Controller {
	public function address(){
		//Recuparation del'utilisateur
		$user =  Auth::user();
		$address = $user->ville;

		return view('front.purchase.address', compact('user'));
	}

	public function livraison(){
		//Recuparation du pays de l'adresse liés à l'utilisateur (donc l'adresse ou on envoie le paquet)
		$user =  Auth::user();

		$livreurs = DB::table('livreur')
		->join('livreur_pays', 'livreur_pays.livreur_id', '=', 'livreur.id')
		->join('livreur_info', 'livreur_info.livreur_id', '=','livreur.id')
		->join('Langue', 'Langue.id', '=','livreur_info.langue_id')
		->where('livreur_pays.pays_id', '=', $user->ville->pays->id)
		->where('Langue.code', Lang::getLocale())
		->get();

		$taux = Devise::where('symbole', '=', Lang::get('menu.devise'))->first()->taux;

		return view('front.purchase.livraison', compact('livreurs', 'user', 'taux'));
	}

	public function livraisonPost(Request $request){
		$v = Validator::make(Request::all(), [
			'livreur' => 'required',
			'cgv' => 'required',
			]);
			if ($v->fails()){ return redirect()->back()->withErrors($v->errors()); }

			Session::put('livreur', Request::get('livreur'));
			return Redirect::route('purchase.payment');
	}
	public function payment(){
			//Ramplacer par l'utilisateur connecter quand ce sera possible
			$user =  Auth::user();
			$livreur = Session::get('livreur');
			$pays = Pays::join('Langue', 'pays.langue_id', '=', 'Langue.id')->where('Langue.code', \Lang::getLocale())->first();

			//Si il n'y a pas de livreur, on redirige vers la page de choix du livreur
			if(empty($livreur)){ return Redirect::route('purchase.livraison'); }

			$livreurPrix = Livreur::find(Session::get('livreur'))->frais($user);

			//Calcul total
			$total = Cart::total() + $livreurPrix;

			return view('front.purchase.payment', compact('produits', 'livreurPrix', 'total', 'pays'));
	}

	public function confirm(){
			Paypal::launchPayment();
	}

	public function suivi(){
			$commande = Commande::select(DB::raw('SUM(commande_exemplaire.montant) as total, reference, commande.created_at, invoice, statut.label AS statut'))
			->where('user_id',  Auth::user()->id)
			->join('commande_exemplaire', 'commande_exemplaire.commande_id', '=', 'commande.id')
			->join('statut', 'statut.id', '=', 'commande.statut_id')
			->groupBy('commande.id')
			->get();

			return view('front.purchase.suivi', compact('commande'));
	}

	public function cancel(){
			return view('front.purchase.cancel');
	}

	public function retour(){

			$user 		=  	Auth::user();
			$livreur 	=  	Livreur::find(Session::get('livreur'));
			$devise 	= 	Devise::where('symbole', '=', Lang::get('menu.devise'))->first();
			$pays 		= 	Pays::join('Langue', 'pays.langue_id', '=', 'Langue.id')->where('Langue.code', Lang::getLocale())->first();

			try{
				//Debut de la transaction(rien ne sera definitif tan qu'il n'y aura pas de commit)
				DB::beginTransaction();

				//On entre les informations la commande finaliseé
				//les infos de la livraison
				$livraison = DB::table('commande_livraison')->insertGetId([
					'adresse' => $user->ville->adresse,
					'cp' => $user->ville->cp,
					'ville' => $user->ville->nom,
				]);

				//les infos de payment (total du panier + frais de livraison)
				$paiement = DB::table('commande_paiement')->insertGetId([
					'montant' => Cart::total()+$livreur->frais($user),
				]);

				//les infos de la commandes
				$commande = DB::table('commande')->insertGetId([
					'livraison_id' => $livraison,
					'paiement_id' => $paiement,
					'user_id' => $user->id,
					'devise_id' => $devise->id,
					'livreur_id' => Session::get('livreur'),
					'commande_at' => DB::raw('NOW()'),
					'livraison_at' => DB::raw('DATE( DATE_ADD( NOW() , INTERVAL '.$livreur->duration.' DAY ) )'),
					'statut_id' => Config::get('constant.command_prepared'),
				]);

				foreach (Cart::content() as $row) {

					//Recuperation de tous les produits commander , les exemplaires non vendu sont lister
					$exemplaire  = DB::table('produit_exemplaire AS pe')->leftJoin('commande_exemplaire AS ce', 'pe.id', '=', 'ce.exemplaire_id')
						->where('produit_id', $row->id)
						->whereNull('ce.exemplaire_id')
						->limit($row->qty)
						->select('ce.*','pe.*')
						->lists('ce.id');

					//si il y a assez d'exemplaire
					if(count($exemplaire) != $row->qty){ throw new Exception('Il n\'y a plus assez de produit');}
					foreach($exemplaire as $id){
						$commande_exemplaire = DB::table('commande_exemplaire')->insertGetId([
							'commande_id' => $commande,
							'exemplaire_id' => $id,
							'devise_id' => $devise->id,
							'montant' => $row->price,
							]);
						}
					}

					//On lance la finalisation du paiement
					if(!Paypal::finishPayment()){throw new Exception('Le paiement n\'a pas pu aboutir');}

					DB::commit();


					//CREATION DE LA FACTURE en PDF
					$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
					// set document (meta) information
					$pdf->SetCreator(PDF_CREATOR);
					$pdf->SetAuthor('PHARMARKET');
					$pdf->SetTitle('invoice-'.date('Y-m-d').'-'.$commande);
					$pdf->SetSubject('Invoice');

					// add a page
					$pdf->AddPage();

					// create address box
					$pdf->CreateTextBox('Pharmarket', 0, 55, 80, 10, 10, 'B');
					$pdf->CreateTextBox('27, rue St antoine', 0, 60, 80, 10, 10);
					$pdf->CreateTextBox('75004, Paris', 0, 65, 80, 10, 10);

					// invoice title / number
					$pdf->CreateTextBox('Invoice #'.$commande, 0, 90, 120, 20, 16);

					// date, order ref
					$pdf->CreateTextBox('Date: '.date('Y-m-d'), 0, 100, 0, 10, 10, '', 'R');
					$pdf->CreateTextBox('Order ref.: #'.$commande, 0, 105, 0, 10, 10, '', 'R');

					// list headers
					$pdf->CreateTextBox(Lang::get('purchase.basket_qty'), 0, 120, 20, 10, 10, 'B', 'C');
					$pdf->CreateTextBox(Lang::get('purchase.basket_produit'), 20, 120, 90, 10, 10, 'B');
					$pdf->CreateTextBox(Lang::get('purchase.basket_price_unit'), 80, 120, 30, 10, 10, 'B', 'R');
					$pdf->CreateTextBox(Lang::get('purchase.totalht'), 110, 120, 30, 10, 10, 'B', 'R');
					$pdf->CreateTextBox(Lang::get('purchase.basket_total'), 140, 120, 30, 10, 10, 'B', 'R');

					$pdf->Line(20, 129, 195, 129);

					$currY = 128;
					foreach (Cart::content() as $row) {
						$pdf->CreateTextBox($row->qty, 0, $currY, 20, 10, 10, '', 'C');
						$pdf->CreateTextBox($row->name, 20, $currY, 90, 10, 10, '');
						$pdf->CreateTextBox(number_format($row->price, 2, '.', '').$devise->symbole, 80, $currY, 30, 10, 10, '', 'R');
						$pdf->CreateTextBox(number_format($row->price * $pays->tva, 2, '.', '') . $devise->symbole, 110, $currY, 30, 10, 10, '', 'R');
						$pdf->CreateTextBox(number_format($row->subtotal, 2, '.', '').$devise->symbole, 140, $currY, 30, 10, 10, '', 'R');
						$currY += 5;
					}
					$pdf->Line(20, $currY+4, 195, $currY+4);

					$currY += 5;
					// output the delivry price
					$pdf->CreateTextBox(Lang::get('purchase.totalht'), 20, $currY, 135, 10, 10, 'B', 'R');
					$pdf->CreateTextBox(number_format(Cart::total()  *  $pays->tva, 2, '.', '').$devise->symbole, 140, $currY, 30, 10, 10, 'B', 'R');

					$currY += 5;
					// output the delivry price
					$pdf->CreateTextBox(Lang::get('purchase.totaltva'), 20, $currY, 135, 10, 10, 'B', 'R');
					$pdf->CreateTextBox(number_format(Cart::total()  *  (1-$pays->tva), 2, '.', '').$devise->symbole, 140, $currY, 30, 10, 10, 'B', 'R');

					$currY += 5;
					// output the delivry price
					$pdf->CreateTextBox(Lang::get('purchase.breadscrumbs_livraison'), 20, $currY, 135, 10, 10, 'B', 'R');
					$pdf->CreateTextBox(number_format($livreur->frais($user), 2, '.', '').$devise->symbole, 140, $currY, 30, 10, 10, 'B', 'R');

					$currY += 5;

					// output the total row
					$pdf->CreateTextBox(Lang::get('purchase.basket_total'), 20, $currY, 135, 10, 10, 'B', 'R');
					$pdf->CreateTextBox(number_format(Cart::total() + $livreur->frais($user), 2, '.', '').$devise->symbole, 140, $currY, 30, 10, 10, 'B', 'R');

					//Close and output PDF document
					$file = public_path() . '/pdf/invoice-'.date('Y-m-d').'-'.$commande.'.pdf';
					$pdf->Output($file, 'F');

					// envoie du mail
					Mail::send('mail.purchase-'.Lang::getLocale(), ['total' => Cart::total() + $livreur->frais($user), 'commande' => $commande], function($message) use ($user, $file){
						$message->to($user->mail, '')->subject(Lang::get('purchase.mail_recap'));
						$message->attach($file);
					});

					//Enregistrement du pdf
					$commande = Commande::find($commande);
					$commande->invoice ='/pdf/invoice-'.date('Y-m-d').'-'.$commande->id.'.pdf';
					$commande->reference = '#'.$commande->id;
					$commande->save();

					//Vider le panier
					Cart::destroy();

					return view('front.purchase.return');
				}catch (Exception $e) {
					//si il y a une exception on rollback
					DB::rollback();
					echo 'Exception reçue : ',  $e->getMessage(), "\n";
				}
		}
}
