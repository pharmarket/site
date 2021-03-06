<?php namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \DB as DB;
use Illuminate\Http\Request;

class RechercheController extends Controller {

	public function index(){

		return View('front.recherche.resultat');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function resultat(Request $request)
	{
		$search = $request->s;
		// Recherche des produits en fonction de la saisie
		$produits = DB::table('produit')
					->orderBy('produit_info.nom', 'ASC')
				  	->join('media', 'produit.id', '=', 'media.produit_id')
				  	->join('produit_marque', 'produit.marque_id', '=', 'produit_marque.id')
					->join('produit_categorie', 'produit.categorie_id', '=', 'produit_categorie.id')
					->join('sous_categorie', 'produit.sous_categorie_id', '=', 'sous_categorie.id')
					->join('produit_info', 'produit.id', '=', 'produit_info.produit_id')
					->join('Langue', 'Langue.id', '=', 'produit_info.langue_id')
					->select('produit.id as idProduit',
							'chemin',
							 'reference',
							 'produit_marque.nom as marqueProduit',
							 'produit_categorie.nom as categorieProduit',
							 'sous_categorie.nom as sousCategorieProduit',
							 'montant',
							 'produit_info.nom',
							 'produit_info.description',
							 'Langue.id',
							 'Langue.label')
					->where('Langue.code' , 'like', \App::getLocale())
					->where('media.default' , 1)
					->where('produit.id', 'like', '%' . $request->s . '%')
					->orWhere('reference', 'like', '%' . $request->s . '%')
					->orWhere('produit_marque.nom', 'like', '%' . $request->s . '%')
					->orWhere('produit_categorie.nom', 'like', '%' . $request->s . '%')
					->orWhere('sous_categorie.nom', 'like', '%' . $request->s . '%')
					->orWhere('produit_info.nom', 'like', '%' . $request->s . '%')
					->orWhere('produit_info.description', 'like', '%' . $request->s . '%')
					->groupBy('produit.id')
					->paginate(8);

		if (!empty($search)) { $produits->appends(['s'=> $search]); }

		return View('front.recherche.resultat', compact('produits'));
	}
}
