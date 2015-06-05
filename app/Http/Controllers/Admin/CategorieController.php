<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\CategorieRequest;
use App\Http\Requests\Categorie2Request;
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
		$langues = \App\Langue::get();
		return View('admin.categorie.create', compact('langues'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Categorie2Request $request)
	{
		// Vérification des données

		// Enregistrement dans la table Produit_catégorie
		

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
		// Vérification que la catégorie n'est pas rattachée à une ou plusieurs sous catégorie
		$nbSousCategorie = \App\Sous_categorie::where('produit_categorie_id', '=', $categorie->id)->count();
		var_dump($nbSousCategorie);

		// Vérification que la catégorie n'est pas rattachée à un produit
		$nbProduit = \App\Produit::where('categorie_id', '=', $categorie->id)->count();
		var_dump($nbProduit);

		// Message indiquant les références des sous catégories rattachées à la catégorie à supprimer
		if($nbSousCategorie>0){
			$message = "Suppression impossible ! Categorie rattachée aux sous-catégorie ayant pour identifiant :";
			$sousCategorie = \App\Sous_categorie::where('produit_categorie_id', '=', $categorie->id)->get();
			foreach ($sousCategorie as $row) {
				$message .= '<li>' . $row->id . '</li>';
			}
		}

		// Message indiquant les références des produits rattachés à la catégorie à supprimer
		if($nbProduit>0){
			$message .= "Suppression impossible ! Categorie rattachée aux produits ayant pour Référence :";
			$produit = \App\Produit::where('categorie_id', '=', $categorie->id)->get();
			foreach ($produit as $row) {
				$message.= '<li>' . $row->reference . '</li>';
			}
		}

		// Suppression de la catégorie si messages vides
		if(!isset($message))
		{
			$categorie->delete();
			return redirect()->back()->withFlashMessage("Suppression de la categorie effectuée avec succès");
		}
		else
		{
			return redirect()->back()->withFlashMessage($message);
		}
	}

}
