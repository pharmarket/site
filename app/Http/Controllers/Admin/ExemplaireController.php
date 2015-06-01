<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\ExemplaireRequest;
use App\Http\Requests\ImportCsvRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ExemplaireController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{  
        $exemplaire = \DB::table('produit_exemplaire')
        			  ->join('produit', 'produit_exemplaire.produit_id', '=', 'produit.id')	
                	  ->select('produit_exemplaire.produit_id', 'produit.reference', \DB::raw('count(produit_exemplaire.id) as total'), 'produit.montant')
                 	  ->whereNotIn('produit_exemplaire.id',function($q){
						    $q->select('exemplaire_id')->from('commande_exemplaire');
						})
                 	  ->groupBy('produit_id')
                 	  ->get();

        $exemplaireImportant = \DB::table('produit_exemplaire')
        			  		   ->join('produit', 'produit_exemplaire.produit_id', '=', 'produit.id')	
                	  		   ->select('produit_exemplaire.produit_id', 'produit.reference', \DB::raw('count(produit_exemplaire.id) as total'), 'produit.montant')
                 	  		   ->whereNotIn('produit_exemplaire.id',function($q){
						    		$q->select('exemplaire_id')->from('commande_exemplaire');
								})
                 	  		   ->having('total','>','20')
                 	  		   ->groupBy('produit_id')
                 	  		   ->get();

        $exemplaireFaible = \DB::table('produit_exemplaire')
	        			    ->join('produit', 'produit_exemplaire.produit_id', '=', 'produit.id')	
	                	    ->select('produit_exemplaire.produit_id', 'produit.reference', \DB::raw('count(produit_exemplaire.id) as total'), 'produit.montant')
	                 	    ->whereNotIn('produit_exemplaire.id',function($q){
							  	$q->select('exemplaire_id')->from('commande_exemplaire');
							  })
	                 	    ->having('total','<=','20')
	                 	    ->groupBy('produit_id')
	                 	    ->get();

		return View('admin.exemplaire.exemplaire', compact('exemplaire', 'exemplaireImportant', 'exemplaireFaible'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$produit = \App\Produit::lists('reference', 'id');

		return View('admin.exemplaire.create', compact('produit'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ExemplaireRequest $request)
	{
		// Enregistrement dans la table Produit_exemplaire 
		$exemplaire = new \App\Produit_exemplaire;
		$exemplaire->produit_id 	= $request->idProduit;
		$exemplaire->reference 		= $request->reference;
		$exemplaire->peremption_at 	= $request->datePeremption;
		$exemplaire->save();

		return redirect('/admin/exemplaire')->withFlashMessage("Ajout de l'exemplaire effectué avec succès");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($idExemplaire)
	{
		$produit_exemplaire = \App\Produit_exemplaire::find($idExemplaire);
		$produit = \App\Produit::lists('reference', 'id');

		return View('admin.exemplaire.edit', compact('produit_exemplaire', 'produit'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ExemplaireRequest $request, $idExemplaire)
	{
		// Enregistrement dans la table Produit_exemplaire 
		$exemplaire = \App\Produit_exemplaire::find($idExemplaire);
		$exemplaire->id 			= $idExemplaire;
		$exemplaire->produit_id 	= $request->produit;

		// Vérification existence de la reférence en base de donnée
		$countRef = \App\Produit_exemplaire::where('reference', '=', $request->reference)->count();
		
		if($countRef > 0){
			$exemplaire->reference = $exemplaire->reference;
		}else{
			$exemplaire->reference = $request->reference;
		}
		
		$exemplaire->peremption_at 	= $request->datePeremption;
		$exemplaire->save();

		return redirect('/admin/exemplaire')->withFlashMessage("Mise à jour de l'exemplaire effectué avec succès");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($idExemplaire)
	{
		// Vérification exemplaire non vendu
		$commande_exemplaire = \App\Commande_exemplaire::where('exemplaire_id', '=', $idExemplaire)->count();

		if($commande_exemplaire==0)
		{
			// Recupere le numéro du produit
			$exemplaire =  \App\Produit_exemplaire::with('produit')->where('id', '=', $idExemplaire)->get();
			$idProduit = $exemplaire[0]->produit_id;
			
			// Recupere le nombre d'exemplaire du produit
			$nbExemplaire = \App\Produit_exemplaire::where('produit_id', '=', $idProduit)->count();

			// Suppression de l'exemplaire
			$produit_exemplaire =  \App\Produit_exemplaire::find($idExemplaire);
			$produit_exemplaire->delete();

			if($nbExemplaire>1){
				return redirect()->back()->withFlashMessage("Suppression de l'exemplaire effectué avec succès");
			}else{
				return redirect('admin/exemplaire')->withFlashMessage("Suppression de l'exemplaire effectué avec succès");
			}
		}
		else
		{
			return redirect('admin/exemplaire')->withFlashMessage("Exemplaire déjà, suppréssion impossible");
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function listingExemplaires($idProduit){

		$exemplaires = \App\Produit_exemplaire::where('produit_id', '=', $idProduit)->get();
		
		return View('admin.exemplaire.listingExemplaires', compact('exemplaires'));
	}

	/**
	 * Import data of CSV file
	 * And store on database
	 *
	 * @return Response
	 */
	public function importCSV(ImportCsvRequest $request){

		if (\Input::hasFile('file')) {

            $file = \Input::file('file');
            \Excel::load($file, function($reader) {
                $reader->setDateFormat('j/n/Y H:i:s');
                $results = $reader->get();
                foreach ($results as $result) {
                    $produit_exemplaire = new \App\Produit_exemplaire;
                    $produit_exemplaire->produit_id 	= $result['produit_id'];
                    $produit_exemplaire->reference  	= $result['reference'];
                    $produit_exemplaire->peremption_at 	= $result['peremption_at'];
                    $produit_exemplaire->save();
                }
            });

            return redirect('/admin/exemplaire')->withFlashMessage("Ajout des exemplaires effectué avec succès");
        }
	}
}
