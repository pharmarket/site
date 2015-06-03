<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CategorieRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategorieController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categorie = \App\Produit_categorie::with('langue')->get();
		return view('admin.categorie.categorie', compact('categorie'));	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$langues = \App\Langue::lists('label', 'id');
		return View('admin.categorie.create', compact('langues'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CategorieRequest $request)
	{
		// Enregistrement dans la table Produit_catégorie
		$categorie = new \App\Produit_categorie;
		$categorie->create($request->all());
		return redirect('/admin/categorie')->withFlashMessage("Création de la catégorie effectuée avec succès");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($categorie)
	{
		return View('admin.categorie.show', compact('categorie'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($categorie)
	{
		// Récuperer Langues
		$langues = \App\Langue::lists('code', 'id');

		return View('admin.categorie.edit', compact('categorie', 'langues'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($categorie, CategorieRequest $request)
	{
		$categorie->langue_id 	= $request->langue_id;
		$categorie->nom 		= $request->nom;
		$categorie->description = $request->description;
		$categorie->save();

		return redirect('/admin/categorie')->withFlashMessage("Mise à jour de la catégorie effectuée avec succès");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($categorie)
	{
		$categorie->delete();
		return redirect()->back()->withFlashMessage("Suppression de la categorie effectuée avec succès");
	}

}
