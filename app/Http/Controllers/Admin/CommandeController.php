<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CommandeRequest;
use App\Http\Requests\EditCommandeRequest;
use App\Http\Requests\ExemplaireRequest;
use App\Http\Requests\ImportCsvRequest;
use Illuminate\Http\Request;

class CommandeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $commande = \App\Commande::with('user', 'devise', 'livraison', 'paiement', 'livreur', 'commandeExemplaire')->get();

        //$commandeExemplaire = \App\Commande_exemplaire::with('exemplaire', 'devise', 'commande')->get();

        return View('admin.commande.commande', compact('commande'));
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreateExemplaire(){
        // Exemplaire commande
        $devise = \App\Devise::lists('nom', 'id');
        $exemplaireProduit = \App\Produit_exemplaire::lists('reference', 'id');
        $commande = \App\Commande::lists('reference', 'id');

        return View('admin.commande.getCreateExemplaire',compact('devise', 'exemplaireProduit', 'commande'));
    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        // Récuperer list select
        $livraison = \App\Commande_livraison::lists('adresse', 'id');
        $paiement = \App\Commande_paiement::lists('montant', 'id');
        $user = \App\User::lists('nom', 'id');
        $devise = \App\Devise::lists('nom', 'id');
        $livreur = \App\Livreur::lists('nom', 'id');

        // Exemplaire commande
        $exemplaireProduit = \App\Produit_exemplaire::lists('reference', 'id');
        $commande = \App\Commande::lists('reference', 'id');

        return View('admin.commande.create',compact('livraison', 'paiement','user', 'devise', 'livreur', 'exemplaireProduit', 'commande'));
	}



    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreateExemplaire(ExemplaireRequest $request){
        // Enregistrement dans la table commande Exemplaire
        $exemplaire = new \App\Commande_exemplaire;
        $exemplaire->exemplaire_id      = $request->exemplaire_id;
        $exemplaire->commande_id      = $request->commande_id;
        $exemplaire->montant      = $request->montant;
        $exemplaire->devise_id      = $request->devise_id;
        $exemplaire->save();

        return redirect('/admin/commande')->withFlashMessage("Création de l'exemplaire effectuée avec succès");
    }



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CommandeRequest $request)
	{
        // Enregistrement dans la table commande
        $commande = new \App\Commande;
        $commande->livraison_id 	    = $request->livraison_id;
        $commande->paiement_id 	        = $request->paiement_id;
        $commande->user_id 	            = $request->user_id;
        $commande->devise_id 	        = $request->devise_id;
        $commande->reference 	        = $request->reference;
        $commande->commande_at 	        = $request->commande_at;
        $commande->livraison_at 	    = $request->livraison_at;
        $commande->statut 	            = $request->statut;
        $commande->livreur_id 	        = $request->livreur_id;
        $commande->save();

        return redirect('/admin/commande')->withFlashMessage("Création de la commande effectuée avec succès");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($commande)
	{
        // Récupération des produits
        $exemplaire = \DB::table('commande_exemplaire')
            ->select(\DB::raw('count(exemplaire_id) as total'))
            ->where('commande_id', '=', $commande->id)
            ->groupBy('commande_id')
            ->get();



        $exemplaireProduct = \DB::table('commande_exemplaire')
            ->select()
            ->join('produit_exemplaire', 'commande_exemplaire.exemplaire_id', '=', 'produit_exemplaire.id')
            ->where('commande_id', '=', $commande->id)
            ->get();

        //dd($exemplaireProduct);
        //dd($exemplaire);

        return View('admin.commande.show', compact('commande', 'exemplaire', 'exemplaireProduct'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($commande)
	{
	    // Récuperer list select
        $livraison = \App\Commande_livraison::lists('adresse', 'id');
        $paiement = \App\Commande_paiement::lists('montant', 'id');
        $user = \App\User::lists('nom', 'id');
        $devise = \App\Devise::lists('nom', 'id');
        $livreur = \App\Livreur::lists('nom', 'id');

        // Exemplaire commande
        $exemplaireProduit = \App\Produit_exemplaire::lists('reference', 'id');
        $commandee = \App\Commande::lists('reference', 'id');

        $commandeExemplaire = \App\Commande_exemplaire::with('exemplaire', 'devise', 'commande')->where('commande_id', '=', $commande->id)->get();

        return View('admin.commande.edit', compact('commande', 'livraison', 'paiement','user', 'devise', 'livreur', 'exemplaireProduit', 'commandee', 'commandeExemplaire'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($commande, EditCommandeRequest $request)
	{
        // Enregistrement dans la table commande
        $commande->livraison_id 	    = $request->livraison_id;
        $commande->paiement_id 	        = $request->paiement_id;
        $commande->user_id 	            = $request->user_id;
        $commande->devise_id 	        = $request->devise_id;
        $commande->commande_at 	        = $request->commande_at;
        $commande->livraison_at 	    = $request->livraison_at;
        $commande->statut 	            = $request->statut;
        $commande->livreur_id 	        = $request->livreur_id;
        $commande->save();


        $commandeExemplaire = \App\Commande_exemplaire::where('commande_id', '=', $commande->id)->get();
        foreach($commandeExemplaire as $item){

            // Enregistrement dans la table commande Exemplaire
            $exemplaire = \App\Commande_exemplaire::find($item->id);

            $exemplaire->exemplaire_id      = \Input::get('exemplaire_id'.$item->id);
            $exemplaire->commande_id      = \Input::get('commande_id'.$item->id);
            $exemplaire->montant      = \Input::get('montant'.$item->id);
            $exemplaire->devise_id      = \Input::get('devise_id'.$item->id);

            $exemplaire->save();

        }

        return redirect('/admin/commande')->withFlashMessage("Mise à jour de la commande effectuée avec succès");
	}



    public function getImportCSV(){
        return View('admin.commande.getImportCSV');
    }


    public function getExportCSV(){
        return View('admin.commande.getExportCSV');
    }


    public function exportCSV(){
        $commande = \App\Commande::with('user', 'devise', 'livraison', 'paiement', 'livreur', 'commandeExemplaire')->get();
        $table = array();

        foreach($commande as $row){
            $commandeE = \App\Commande_exemplaire::with('exemplaire', 'devise', 'commande')->where('commande_id', '=', $row->id)->get();
            foreach($commandeE as $e) {
                $table[] = array(
                    $row->reference,
                    $row->commande_at,
                    $row->livraison_at,
                    $row->statut,
                    $row->livraison->adresse,
                    $row->livraison->cp,
                    $row->livraison->ville,
                    $row->paiement->montant,
                    $row->user->nom,
                    $row->user->prenom,
                    $row->user->mail,
                    $row->user->pseudo,
                    $row->user->phone,
                    $row->user->mobile,
                    $row->devise->nom,
                    $row->devise->symbole,
                    $row->devise->taux,
                    $row->livreur->duration,
                    $row->livreur->nom,
                    $e->montant,
                    $e->exemplaire->reference,
                    $e->devise->nom
                );
            }
        }

        \Excel::create('Commande', function($excel) use($table) {
            $excel->sheet('Commande', function ($sheet) use($table) {
                $sheet->fromArray($table);
                $sheet->row(1, array(
                    'ref_commande',
                    'commande_at',
                    'livraison_at',
                    'statut_commande',
                    'adresse_livraison',
                    'cp_livraison',
                    'ville_livraison',
                    'montant_paiement',
                    'nom_user',
                    'prenom_user',
                    'mail_user',
                    'pseudo_user',
                    'phone_user',
                    'mobile_user',
                    'nom_devise',
                    'symbol_devise',
                    'taux_devise',
                    'duration_livreur',
                    'nom_livreur',
                    'montant_commandeExemplaire',
                    'reference_produit',
                    'devise_exemplaire'
                ));
            });
        })->export('csv');
    }


    /**
     * @param ImportCsvRequest $request
     * @return mixed
     */
    public function importCSVCommande(){
        if (\Input::hasFile('file')) {
            $file = \Input::file('file');
            \Excel::load($file, function ($reader) {
                $reader->setDateFormat('j/n/Y H:i:s');
                $results = $reader->get();
                foreach ($results as $result) {
                    $commande = new \App\Commande;
                    $commande->livraison_id = $result['livraison_id'];
                    $commande->paiement_id = $result['paiement_id'];
                    $commande->user_id = $result['user_id'];
                    $commande->devise_id = $result['devise_id'];
                    $commande->reference = $result['reference'];
                    $commande->commande_at = $result['commande_at'];
                    $commande->livraison_at = $result['livraison_at'];
                    $commande->statut = $result['statut'];
                    $commande->livreur_id = $result['livreur_id'];
                    $commande->save();
                }
            });

            return redirect('/admin/commande')->withFlashMessage("Import effectuè avec succès");
        }else{
            $rules = array('file'=>'required|mimes:csv');

            $validator = \Validator::make(\Input::all(), $rules);

            if ($validator->fails())
            {
                return View('admin.commande.getImportCSV')->withErrors($validator);
            }
        }
    }



    /**
     * @param ImportCsvRequest $request
     * @return mixed
     */
    public function importCSVCommandeExemplaire(){
        if (\Input::hasFile('file')) {
            $file = \Input::file('file');
            \Excel::load($file, function ($reader) {
                $reader->setDateFormat('j/n/Y H:i:s');
                $results = $reader->get();
                foreach ($results as $result) {
                    $commande_exemplaire = new \App\Commande_exemplaire;
                    $commande_exemplaire->exemplaire_id = $result['exemplaire_id'];
                    $commande_exemplaire->commande_id = $result['commande_id'];
                    $commande_exemplaire->montant = $result['montant'];
                    $commande_exemplaire->devise_id = $result['devise_id'];
                    $commande_exemplaire->save();
                }
            });

            return redirect('/admin/commande')->withFlashMessage("Import effectuè avec succès");
        }else{
            $rules = array('file'=>'required|mimes:csv');

            $validator = \Validator::make(\Input::all(), $rules);

            if ($validator->fails())
            {
                return View('admin.commande.getImportCSV')->withErrors($validator);
            }
        }
    }



    /**
     * @param ImportCsvRequest $request
     * @return mixed
     */
    public function importCSVCommandePaiement(){
        if (\Input::hasFile('file')) {
            $file = \Input::file('file');
            \Excel::load($file, function ($reader) {
                $reader->setDateFormat('j/n/Y H:i:s');
                $results = $reader->get();
                foreach ($results as $result) {
                    $commande_paiement = new \App\Commande_paiement;
                    $commande_paiement->montant = $result['montant'];
                    $commande_paiement->save();
                }
            });

            return redirect('/admin/commande')->withFlashMessage("Import effectuè avec succès");
        }else{
            $rules = array('file'=>'required|mimes:csv');

            $validator = \Validator::make(\Input::all(), $rules);

            if ($validator->fails())
            {
                return View('admin.commande.getImportCSV')->withErrors($validator);
            }
        }
    }



    /**
     * @param ImportCsvRequest $request
     * @return mixed
     */
    public function importCSVCommandeLivraison(){
        if (\Input::hasFile('file')) {

            $file = \Input::file('file');
            \Excel::load($file, function ($reader) {
                $reader->setDateFormat('j/n/Y H:i:s');
                $results = $reader->get();
                foreach ($results as $result) {
                    //dd($result);
                    $commande_livraison = new \App\Commande_livraison;
                    $commande_livraison->adresse = $result['adresse'];
                    $commande_livraison->cp = $result['cp'];
                    $commande_livraison->ville = $result['ville'];
                    $commande_livraison->save();
                }
            });

            return redirect('/admin/commande')->withFlashMessage("Import effectuè avec succès");
        }else{
            $rules = array('file'=>'required|mimes:csv');

            $validator = \Validator::make(\Input::all(), $rules);

            if ($validator->fails())
            {
                return View('admin.commande.getImportCSV')->withErrors($validator);
            }
        }
    }



    /**
     * @param ImportCsvRequest $request
     * @return mixed
     */
    public function importCSVLivreur(){
        if (\Input::hasFile('file')) {
            $file = \Input::file('file');
            \Excel::load($file, function($reader) {
                $reader->setDateFormat('j/n/Y H:i:s');
                $results = $reader->get();
                foreach ($results as $result) {
                    $livreur = new \App\Livreur;
                    $livreur->is_livrable 	= $result['is_livrable'];
                    $livreur->duration  	= $result['duration'];
                    $livreur->nom 	= $result['nom'];
                    $livreur->logo = $result['logo'];
                    $livreur->save();
                }
            });

            return redirect('/admin/commande')->withFlashMessage("Import effectuè avec succès");
        }else{
            $rules = array('file'=>'required|mimes:csv');

            $validator = \Validator::make(\Input::all(), $rules);

            if ($validator->fails())
            {
                return View('admin.commande.getImportCSV')->withErrors($validator);
            }
        }
    }






	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($commande)
	{
        //Suppression de des données dans la table commande
        $commande->delete();
        return redirect()->back()->withFlashMessage("Suppression de la commande effectuée avec succès");
	}

}
