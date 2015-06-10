<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditVenteRequest;
use App\Http\Requests\ExemplaireVenteRequest;
use App\Http\Requests\VenteRequest;
use Illuminate\Http\Request;

class VenteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$vente = \App\Vente::with('devise', 'entrepot', 'ventee', 'fournisseur')->get();
		return View('admin.vente.vente', compact('vente'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// VENTE
		$devise = \App\Devise::lists('nom', 'id');
		$entrepot = \App\Ville::lists('nom', 'id');
		$fournisseur = \App\Fournisseur::lists('siret', 'id');
		$statut = \App\Vente_statut::lists('label', 'id');

		return View('admin.vente.create',compact('fournisseur', 'devise','entrepot', 'statut'));
	}



    /**
     * @return \Illuminate\View\View
     */
    public function getExemplaireVente(){
        // EXEMPLAIRE VENTE
        $vente = \App\Vente::lists('reference', 'id');
        $produitExemplaire = \App\Produit_exemplaire::lists('reference', 'id');

        return View('admin.vente.createExemplaireVente',compact('produitExemplaire', 'vente'));
    }



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(VenteRequest $request)
	{
	            // Enregistrement dans la table vente
	            $vente = new \App\Vente;
	            $vente->devise_id 	        = $request->devise_id;
	            $vente->entrepot_id 	            = $request->entrepot_id;
	            $vente->fournisseur_id      = $request->fournisseur_id;
	            $vente->reference 	        = $request->reference;
	            $vente->commande_at 	        = \DB::raw('NOW()');
	            $vente->livraison_at 	        = $request->livraison_at;
	            $vente->statut_id 	        = $request->statut;
	            $vente->montant 	        = $request->montant;
	            $vente->save();

        		return redirect('/admin/vente')->withFlashMessage("Création de la vente effectuée avec succès");
	}



    /**
     * @param ExemplaireVenteRequest $request
     * @return mixed
     */
    public function exemplaireVente(ExemplaireVenteRequest $request){
        // Enregistrement dans la table exemplaire vente
        $exemplaireVente = new \App\Vente_exemplaire;
        $exemplaireVente->achat_id      = $request->vente_id;
        $exemplaireVente->exemplaire_id      = $request->exemplaire_id;
        $exemplaireVente->quantite      = $request->quantite;
        $exemplaireVente->montant      = $request->montant;

        $exemplaireVente->save();

        return redirect('/admin/vente')->withFlashMessage('Création de l\'exemplaire de vente effectuée avec succès');
    }






	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($vente)
	{
        //$vente = \App\Vente::with('devise', 'entrepot', 'ventee', 'fournisseur')->get();
        return View('admin.vente.show', compact('vente'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($vente)
	{
		// VENTE
		$devise = \App\Devise::lists('nom', 'id');
		$entrepot = \App\Ville::lists('nom', 'id');
		$fournisseur = \App\Fournisseur::lists('siret', 'id');
		$statut = \App\Vente_statut::lists('label', 'id');

		// EXEMPLAIRE VENTE
		$ventee = \App\Vente::lists('reference', 'id');

		$produitExemplaire = \App\Produit_exemplaire::lists('reference', 'id');

		return View('admin.vente.edit', compact('vente', 'fournisseur', 'devise','entrepot', 'produitExemplaire', 'ventee', 'pays', 'statut'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($vente, EditVenteRequest $request)
	{
		// Enregistrement dans la table vente
		$vente->devise_id 	        = $request->devise_id;
		$vente->entrepot_id 	            = $request->entrepot_id;
		$vente->fournisseur_id      = $request->fournisseur_id;
		$vente->commande_at 	        = $request->commande_at;
		$vente->livraison_at 	        = $request->livraison_at;
		$vente->statut_id 	        = $request->statut;
		$vente->montant 	        = $request->montant;
		$vente->save();



		$exVente = \App\Vente_exemplaire::with('vente', 'produit_exemplaire')->where('achat_id', '=', $vente->id)->get();
		foreach($exVente as $item){
			$exemplaireVente = \App\Vente_exemplaire::find($item->id);
			$exemplaireVente->montant      = \Input::get('montant'.$item->id);

			$exemplaireVente->save();
		}

		return redirect('/admin/vente')->withFlashMessage("Mise à jour effectuée avec succès");
	}





    /**
     * @return \Illuminate\View\View
     */
    public function getImportCSV(){
        return View('admin.vente.getImportCSV');
    }



    /**
     * @return \Illuminate\View\View
     */
    public function getExportCSV(){
        return View('admin.vente.getExportCSV');
    }


    /**
     * Export CSV
     */
    public function exportCSV(){
        $vente = \App\Vente::with('devise', 'entrepot', 'ventee', 'fournisseur')->get();
        $table = array();

        foreach($vente as $row){
            $venteExemplaire = \App\Vente_exemplaire::with('vente', 'produit_exemplaire')->where('achat_id', '=', $row->id)->get();
            foreach($venteExemplaire as $e) {
                $table[] = array(
                    $row->reference,
                    $row->commande_at,
                    $row->livraison_at,
                    $row->statut->label,
                    $row->montant,
                    $row->devise->nom,
                    $row->devise->symbole,
                    $row->devise->taux,
                    $row->entrepot->nom,
                    $row->entrepot->cp,
                    $row->entrepot->adresse,
                    $row->fournisseur->siret,
                    $row->fournisseur->nom,
                    $row->fournisseur->adresse,
                    $row->fournisseur->cp,
                    $row->fournisseur->ville,
                    $row->fournisseur->phone,
                    $row->fournisseur->contact,
                    $row->fournisseur->commentaire,
                    $e->quantite,
                    $e->montant,
                    $e->produit_exemplaire->reference
                );
            }
        }

        \Excel::create('Vente', function($excel) use($table) {
            $excel->sheet('Vente', function ($sheet) use($table) {
                $sheet->fromArray($table);
                $sheet->row(1, array(
                    'ref_vente',
                    'commande_at',
                    'livraison_at',
                    'statut_vente',
                    'montant_vente',
                    'nom_devise',
                    'symbol_devise',
                    'taux_devise',
                    'nom_ville',
                    'cp_ville',
                    'adresse_ville',
                    'siret_fournisseur',
                    'nom_fournisseur',
                    'adresse_fournisseur',
                    'cp_fournisseur',
                    'ville_fournisseur',
                    'phone_fournisseur',
                    'contact_fournisseur',
                    'commentaire_fournisseur',
                    'quantite_exemplaire',
                    'montant',
                    'reference_produit'
                ));
            });
        })->export('csv');
    }

    /**
     * @param ImportCsvRequest $request
     * @return mixed
     */
    public function importCSVEV(){
        if (\Input::hasFile('file')) {
            $file = \Input::file('file');
            \Excel::load($file, function ($reader) {
                $reader->setDateFormat('j/n/Y H:i:s');
                $results = $reader->get();
                foreach ($results as $result) {
                    $ev = new \App\Vente_exemplaire;
                    $ev->achat_id = $result['vente_id'];
                    $ev->exemplaire_id = $result['exemplaire_id'];
                    $ev->reference = $result['reference'];
                    $ev->montant = $result['montant'];
                    $ev->save();
                }
            });

            return redirect('/admin/vente')->withFlashMessage("Import effectuè avec succès");
        }else{
            $rules = array('file'=>'required|mimes:csv');

            $validator = \Validator::make(\Input::all(), $rules);

            if ($validator->fails())
            {
                return View('admin.vente.getImportCSV')->withErrors($validator);
            }
        }
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($vente)
	{
        //Suppression de des données dans la table commande
        $vente->delete();
        return redirect()->back()->withFlashMessage("Suppression de la vente effectuée avec succès");
	}

}
