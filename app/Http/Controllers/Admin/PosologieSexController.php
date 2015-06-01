<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\PosologieSexRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PosologieSexController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Infos concernant la posologie
		$posologie_sexe = \App\Posologie_sexe::with('produit')->get();

		return View('admin.posologie_sex.posologie_sex', compact('posologie_sexe'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Récuperer Produit & Type
		$produits 	= \App\Produit::lists('reference', 'id');

		return View('admin.posologie_sex.create', compact('produits'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PosologieSexRequest $request)
	{
		// Enregistrement dans la table Posologie
		$posologie_sexe = new \App\Posologie_sexe;
		$posologie_sexe->produit_id = $request->produit;
		$posologie_sexe->sexe 	 	= $request->sexe;
		$posologie_sexe->coeff 		= $request->coeff;
		$posologie_sexe->save();

		return redirect('/admin/posologie_sex')->withFlashMessage("Création de la posologie effectuée avec succès");
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
	public function edit($posologie_sexe)
	{ 
		// Récupere Posologie_sexe et Produits
		$posologie_sexe = \App\Posologie_sexe::find($posologie_sexe);
		$produits 		= \App\Produit::lists('reference', 'id');

		return View('admin.posologie_sex.edit', compact('posologie_sexe', 'produits'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($posologie_sexe, PosologieSexRequest $request)
	{
		$posologie_sexe = \App\Posologie_sexe::find($posologie_sexe);

		// Enregistrement dans la table Posologie Sexe
		$posologie_sexe->produit_id = $request->produit;
		$posologie_sexe->sexe 	 	= $request->sexe;
		$posologie_sexe->coeff 		= $request->coeff;
		$posologie_sexe->save();

		return redirect('/admin/produit/'.$posologie_sexe->produit_id)->withFlashMessage("Mise à jour de la posologie sexe effectuée avec succès");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($posologie_sexe)
	{
		$posologie_sexe = \App\Posologie_sexe::find($posologie_sexe);
		
		//Suppression de des données dans la table posologie 
		$posologie_sexe->delete();
		
        return redirect()->back()->withFlashMessage("Suppression de la posologie effectuée avec succès");
	}

}
