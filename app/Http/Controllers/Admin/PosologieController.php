<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\PosologieRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PosologieController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Infos concernant la posologie
		$posologie = \App\Posologie::with('produit')->get();

		return View('admin.posologie.posologie', compact('posologie'));
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
		$types		= \App\Posologie_type::lists('label', 'id');

		return View('admin.posologie.create', compact('produits', 'types'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PosologieRequest $request)
	{	
		// Enregistrement dans la table Posologie
		$posologie = new \App\Posologie;
		$posologie->produit_id 	= $request->produit;
		$posologie->type_id 	= $request->type;
		$posologie->min			= $request->min;
		$posologie->max 		= $request->max;
		$posologie->coeff 		= $request->coeff;
		$posologie->save();

		return redirect('/admin/posologie')->withFlashMessage("Création de la posologie effectuée avec succès");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($posologie)
	{
		return View('admin.posologie.show', compact('posologie'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($posologie)
	{
		// Récuperer Produits & Types
		$produits 	= \App\Produit::lists('reference', 'id');
		$types  	= \App\Posologie_type::lists('label', 'id');

		return View('admin.posologie.edit', compact('posologie', 'produits', 'types'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($posologie, PosologieRequest $request)
	{
		// Enregistrement dans la table Posologie
		$posologie->produit_id 	= $request->produit;
		$posologie->type_id 	= $request->type;
		$posologie->min			= $request->min;
		$posologie->max 		= $request->max;
		$posologie->coeff 		= $request->coeff;
		$posologie->save();

		return redirect('/admin/produit/'.$posologie->produit_id)->withFlashMessage("Mise à jour de la posologie effectuée avec succès");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($posologie)
	{	
		//Suppression de des données dans la table posologie 
		$posologie->delete();
		
        return redirect()->back()->withFlashMessage("Suppression de la posologie effectuée avec succès");
	}

}
