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
	 * GHet Produit - Commentaire by ID
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = \Input::get('data');
        //dd($data);

        $validator = \Validator::make(
            $data,
            array(
                'user_id' => 'required|numeric',
                'produit_id' => 'required|numeric',
                'nom' => 'required|max:45',
                'description' => 'required',
                'note' => 'required|numeric',
                'done' => 'required|numeric'
            )
        );

        if($validator->fails()){
            return $validator->errors();
        }
        else {
            if ($commentaire = \App\Commentaire::create($data)) {
                return response()->json(['commentaire' => $commentaire], 200);
            } else {
                return response()->json('', 400);
            }
        }
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
