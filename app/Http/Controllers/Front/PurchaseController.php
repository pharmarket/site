<?php namespace App\Http\Controllers\Front;

class PurchaseController extends Controller {
	public function address(){
		//Recuparation del'utilisateur
		$user = \App\User::findOrFail(1);
		$address = $user->ville;

		return view('front.purchase.address', compact('user'));
	}

	public function livraison(){
		//Recuparation du pays de l'adresse liés à l'utilisateur (donc l'adresse ou on envoie le paquet)
		$user =  \App\User::findOrFail(1);

		$livreurs = \DB::table('livreur')
		            ->join('livreur_pays', 'livreur_pays.livreur_id', '=', 'livreur.id')
		            ->join('livreur_info', 'livreur_info.livreur_id', '=','livreur.id')
		            ->join('Langue', 'Langue.id', '=','livreur_info.langue_id')
		            ->where('livreur_pays.pays_id', '=', $user->ville->pays->id)
		            ->where('Langue.code', '=', 'EN')
		            ->get();

		$taux = \App\Devise::where('symbole', '=', \Lang::get('menu.devise'))->get()[0]->taux;

		return view('front.purchase.livraison', compact('livreurs', 'user', 'taux'));
	}

	public function livraisonPost(\Request $request){
		$v = \Validator::make(\Request::all(), [
		        'livreur' => 'required',
		        'cgv' => 'required',
		    ]);
		if ($v->fails()){ return redirect()->back()->withErrors($v->errors()); }

		\Session::put('livreur', \Request::get('livreur'));
		return \Redirect::route('purchase.payment');
	}
	public function payment(){
		//Ramplacer par l'utilisateur connecter quand ce sera possible
		$user =  \App\User::findOrFail(1);
		$livreur = \Session::get('livreur');

		//Si il n'y a pas de livreur, on redirige vers la page de choix du livreur
		if(empty($livreur)){ return \Redirect::route('purchase.livraison'); }
		// \Cart::destroy();
		// \Cart::add([
		// 	['id' => '43', 'name' => 'Product 1', 'qty' => 1, 'price' => 10.00, 'options' => array('logo' => 'img/produit1.jpg')],
		// 	['id' => '53', 'name' => 'Product 2', 'qty' => 1, 'price' => 10.00, 'options' => array('logo' => 'img/produit2.jpg')]
		// ]);

		$livreurPrix = \App\Livreur::find(\Session::get('livreur'))->frais($user);

		//Calcul total
		$total = \Cart::total() + $livreurPrix;

		return view('front.purchase.payment', compact('produits', 'livreurPrix', 'total'));
	}

	public function confirm(){
		\App\Library\Paypal::launchPayment();
	}

	public function cancel(){
		return view('front.purchase.cancel');
	}

	public function retour(){// create new PDF document

		if(\App\Library\Paypal::finishPayment()){
			$user = \App\User::findOrFail(1);
			$livreur =  \App\Livreur::find(\Session::get('livreur'));
			$devise = \App\Devise::where('symbole', '=', \Lang::get('menu.devise'))->get()[0];

			\DB::beginTransaction();
			//On deentre la commande finaliseé
			$livraison = \DB::table('commande_livraison')->insertGetId([
				'adresse' => $user->ville->adresse,
				'cp' => $user->ville->cp,
				'ville' => $user->ville->nom,
			]);
			$paiement = \DB::table('commande_paiement')->insertGetId([
				'montant' => \Cart::total()+$livreur->frais($user),
			]);
			$commande = \DB::table('commande')->insertGetId([
				'livraison_id' => $livraison,
				'paiement_id' => $paiement,
				'user_id' => $user->id,
				'devise_id' => $devise->id,
				'livreur_id' => \Session::get('livreur'),
				'commande_at' => \DB::raw('NOW()'),
				'livraison_at' => \DB::raw('DATE( DATE_ADD( NOW() , INTERVAL '.$livreur->duration.' DAY ) )'),
				'statut' => 'commandé',
			]);

			foreach (\Cart::content() as $row) {
				//Recuperation d'exemplaire
				$exemplaire  = \DB::table('produit_exemplaire')	->leftJoin('commande_exemplaire', 'produit_exemplaire.id', '=', 'commande_exemplaire.exemplaire_id')
											->whereNull('exemplaire_id')
											->where('produit_id', $row->id)
											->limit($row->qty)
											->get();
				foreach($exemplaire as $value){
					$commande_exemplaire = \DB::table('commande_exemplaire')->insertGetId([
						'commande_id' => $commande,
						'exemplaire_id' => $value->id,
						'devise_id' => $devise->id,
						'montant' => $row->price,
					]);
				}
			}
			\DB::commit();

			//Vider le panier
			// \Cart::destroy();

			//cREATION DE LA FACTURE

			$pdf = new \App\Library\MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
			$pdf->CreateTextBox(\Lang::get('purchase.basket_qty'), 0, 120, 20, 10, 10, 'B', 'C');
			$pdf->CreateTextBox(\Lang::get('purchase.basket_produit'), 20, 120, 90, 10, 10, 'B');
			$pdf->CreateTextBox(\Lang::get('purchase.basket_price_unit'), 110, 120, 30, 10, 10, 'B', 'R');
			$pdf->CreateTextBox(\Lang::get('purchase.basket_total'), 140, 120, 30, 10, 10, 'B', 'R');

			$pdf->Line(20, 129, 195, 129);

			$currY = 128;
			foreach (\Cart::content() as $row) {
				$pdf->CreateTextBox($row->qty, 0, $currY, 20, 10, 10, '', 'C');
				$pdf->CreateTextBox($row->name, 20, $currY, 90, 10, 10, '');
				$pdf->CreateTextBox('$'.$row->price, 110, $currY, 30, 10, 10, '', 'R');
				$pdf->CreateTextBox('$'.$row->subtotal, 140, $currY, 30, 10, 10, '', 'R');
				$currY += 5;
			}
			$pdf->Line(20, $currY+4, 195, $currY+4);

			$currY += 5;
			// output the delivry price
			$pdf->CreateTextBox(\Lang::get('purchase.breadscrumbs_livraison'), 20, $currY, 135, 10, 10, 'B', 'R');
			$pdf->CreateTextBox('$'.number_format($livreur->frais($user), 2, '.', ''), 140, $currY, 30, 10, 10, 'B', 'R');

			$currY += 5;

			// output the total row
			$pdf->CreateTextBox(\Lang::get('purchase.basket_total'), 20, $currY, 135, 10, 10, 'B', 'R');
			$pdf->CreateTextBox('$'.number_format(\Cart::total() + $livreur->frais($user), 2, '.', ''), 140, $currY, 30, 10, 10, 'B', 'R');

			//Close and output PDF document
			$file = public_path() . '/pdf/invoice-'.date('Y-m-d').'-'.$commande.'.pdf';
			$pdf->Output($file, 'F');

			// envoie du mail
			\Mail::send('mail.purchase-'.\Lang::getLocale(), ['total' => \Cart::total() + $livreur->frais($user), 'commande' => $commande], function($message) use ($user, $file){
			    	$message->to($user->mail, '')->subject(\Lang::get('purchase.mail_recap'));
    				$message->attach($file);
			});

			return view('front.purchase.return');
		}else{
			\Redirect::route('home');
		}
	}
}
