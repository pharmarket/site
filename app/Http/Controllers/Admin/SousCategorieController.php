<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\SousCategorieRequest;
use App\Http\Requests\SousCategorie2Request;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SousCategorieController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sous_categorie = \App\Sous_categorie::with('langue')->get();
		return view('admin.sous_categorie.sous_categorie', compact('sous_categorie'));	
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
	public function store(SousCategorie2Request $request)
	{
		// Enregistrement dans la table sous_categorie
		for ($i=1; $i<5 ; $i++) {
			$categorie = new \App\Produit_categorie;
			$categorie->langue_id 	= $i;
			$categorie->nom 		= $request->{'nom_'.$i};
			$categorie->description = $request->{'description_'.$i};
			$categorie->save();
		}

		return redirect('/admin/categorie')->withFlashMessage("Création de la catégorie effectuée avec succès");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($sous_categorie)
	{
		return View('admin.sous_categorie.show', compact('sous_categorie'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($sous_categorie)
	{
		// Récuperer Langues
		$langues = \App\Langue::lists('code', 'id');

		return View('admin.sous_categorie.edit', compact('sous_categorie', 'langues'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($sous_categorie, SousCategorieRequest $request)
	{
		//dd($request->all());

		$sous_categorie->langue_id 	= $request->langue_id;
		$sous_categorie->nom 		= $request->nom;
		$sous_categorie->description = $request->description;
		$sous_categorie->save();

		return redirect('/admin/sous_categorie')->withFlashMessage("Mise à jour de la sous-catégorie effectuée avec succès");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($sous_categorie)
	{
		$sous_categorie->delete();
		return redirect()->back()->withFlashMessage("Suppression de la sous-categorie effectuée avec succès");
	}

}
