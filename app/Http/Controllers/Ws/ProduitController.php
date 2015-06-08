<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProduitController extends Controller {
/**
	 * GHet Produit by ID
	 *
	 * @return Response
	 */
	public function show($produit)
	{
        $produit = \App\Produit::with('categorie', 'sous_categorie', 'marque', 'media', 'info', 'langues', 'fournisseurs')->find($produit->id);
        return $produit;
	}
	/**
	 * GHet Produit by ID
	 *
	 *	params where string
	 *
	 * @return Response
	 */
	public function index()
	{
		$where = \Input::get('where');
		if(!empty($where)) { return \App\Produit::with('categorie', 'sous_categorie', 'marque', 'media', 'info', 'langues', 'fournisseurs')->whereRaw($where)->get(); }
		else{ return \App\Produit::with('categorie', 'sous_categorie', 'marque', 'media', 'info', 'langues', 'fournisseurs')->get(); }
	}
	/**
	 * GHet Produit by ID
	 *
	 * @return Response
	 */
	public function store()
	{
	}
	/**
	 * GHet Produit by ID
	 *
	 * @return Response
	 */
	public function destroy($produit)
	{
	}
	/**
	 * GHet Produit by ID
	 *
	 * @return Response
	 */
	public function update($produit)
	{
	}

}
