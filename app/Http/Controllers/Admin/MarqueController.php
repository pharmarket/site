<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\MarqueRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MarqueController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$marque = \App\Produit_marque::get();
		return View('admin.marque.marque', compact('marque'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View('admin.marque.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(MarqueRequest $request)
	{
		// Enregistrement dans la table Newsletter
		$marque = new \App\Produit_marque;
		$marque->create($request->all());
		return redirect('/admin/marque')->withFlashMessage("Création de la marque effectuée avec succès");
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
	public function edit($marque)
	{
		return View('admin.marque.edit', compact('marque'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(MarqueRequest $request, $marque)
	{
		// Vérification que la marque mis à jour n'existe pas déja dans un autre enregistrement
		$marque->nom = $request->nom;
		$marque->save();

		return redirect('/admin/marque')->withFlashMessage("Mise à jour de la marque effectuée avec succès");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($produit_marque)
	{
		$produit_marque->delete();
		return redirect()->back()->withFlashMessage("Suppression de la marque effectuée avec succès");
	}

}
