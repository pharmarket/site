<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditFournisseurRequest;
use App\Http\Requests\FournisseurRequest;
use App\Http\Requests\ImportCsvRequest;
use App\Http\Requests\ProduitFournisseurRequest;
use App\Http\Requests\VenteFournisseurRequest;
use Illuminate\Http\Request;

class FournisseurController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $fournisseur = \App\Fournisseur::with('ventee', 'produitFournisseur', 'produit')->get();
        return View('admin.fournisseur.fournisseur', compact('fournisseur'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View('admin.fournisseur.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(FournisseurRequest $request)
	{
        // Enregistrement dans la table fournisseur
        $fournisseur = new \App\Fournisseur;
        $fournisseur->siret 	        = $request->siret;
        $fournisseur->nom 	            = $request->nom;
        $fournisseur->adresse 	        = $request->adresse;
        $fournisseur->cp 	        = $request->cp;
        $fournisseur->ville 	        = $request->ville;
        $fournisseur->phone 	    = $request->phone;
        $fournisseur->contact 	            = $request->contact;
        $fournisseur->commentaire 	        = $request->commentaire;
        $fournisseur->save();

        return redirect('/admin/fournisseur')->withFlashMessage("Création du fournisseur effectuée avec succès");
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($fournisseur)
	{
        $fournisseurp = \App\Fournisseur::with('ventee', 'produitFournisseur', 'produit')->where('id', '=', $fournisseur->id)->get();
        return View('admin.fournisseur.show', compact('fournisseur' ,'fournisseurp'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($fournisseur)
	{

        // VENTE
        $fournisseurr = \App\Fournisseur::lists('siret', 'id');
        $devise = \App\Devise::lists('nom', 'id');
        $entrepot = \App\Ville::lists('nom', 'id');

        // PRODUIT FOURNISSEUR
        $produit = \App\Produit::lists('reference', 'id');
        $fournisseure = \App\Fournisseur::lists('siret', 'id');

        return View('admin.fournisseur.edit', compact('fournisseur', 'devise','entrepot', 'produit', 'fournisseure', 'fournisseurr'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($fournisseur, EditFournisseurRequest $request)
	{
        // Enregistrement dans la table fournisseur
        $fournisseur->nom 	            = $request->nom;
        $fournisseur->adresse 	        = $request->adresse;
        $fournisseur->cp 	        = $request->cp;
        $fournisseur->ville 	        = $request->ville;
        $fournisseur->phone 	    = $request->phone;
        $fournisseur->contact 	            = $request->contact;
        $fournisseur->commentaire 	        = $request->commentaire;
        $fournisseur->save();






        $venteFournisseur = \App\Vente::with('devise', 'entrepot', 'ventee', 'fournisseur')->where('fournisseur_id', '=', $fournisseur->id)->get();
        foreach($venteFournisseur as $item){
            // Enregistrement dans la table vente
            $vente = \App\Vente::find($item->id);
            $vente->devise_id      = \Input::get('devise_id'.$item->id);
            $vente->entrepot_id      = \Input::get('entrepot_id'.$item->id);
            $vente->fournisseur_id  = \Input::get('fournisseur_id'.$item->id);
            $vente->commande_at      = \Input::get('commande_at'.$item->id);
            $vente->livraison_at      = \Input::get('livraison_at'.$item->id);
            $vente->statut      = \Input::get('statut'.$item->id);
            $vente->montant      = \Input::get('montant'.$item->id);

            $vente->save();
        }





        $produitFournisseur = \App\Produit_fournisseur::with('produit', 'fournisseur')->where('fournisseur_id', '=', $fournisseur->id)->get();
        foreach($produitFournisseur as $item){
            // Enregistrement dans la table produit_fournisseur
            $pf = \App\Produit_fournisseur::find($item->id);
            $pf->produit_id      = \Input::get('produit_id'.$item->id);
            $pf->fournisseur_id      = \Input::get('fournisseur_id'.$item->id);

            $pf->save();
        }

        return redirect('/admin/fournisseur')->withFlashMessage("Mise à jour effectuée avec succès");
	}

    public function getExportCSV(){
        return View('admin.fournisseur.getExportCSV');
    }




    public function exportCSV(){
        $fournisseur = \App\Fournisseur::with('ventee', 'produitFournisseur', 'produit')->get();
        $table = array();

        foreach($fournisseur as $row){

            $table[] = array(
                $row->siret,
                $row->nom,
                $row->adresse,
                $row->cp,
                $row->ville,
                $row->phone,
                $row->contact,
                $row->commentaire
            );
        }

        \Excel::create('Fournisseur', function($excel) use($table) {
            $excel->sheet('Fournisseur', function ($sheet) use($table) {
                $sheet->fromArray($table);
                $sheet->row(1, array(
                    'siret',
                    'nom',
                    'adresse',
                    'cp',
                    'ville',
                    'phone',
                    'contact',
                    'commentaire'
                ));
            });
        })->export('csv');
    }






	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($fournisseur)
	{
        //Suppression de des données dans la table commande
        $fournisseur->delete();
        return redirect()->back()->withFlashMessage("Suppression du fournisseur effectuée avec succès");
	}

}
