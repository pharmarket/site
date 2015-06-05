<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeAppController extends Controller {
/**
	 * GHet user by ID
	 *
	 * @return Response
	 */
	public function show($produit)
	{
		return $produit;
	}
	/**
	 * GHet user by ID
	 *
	 *	params where string
	 *
	 * @return Response
	 */
	public function index()
	{
		$where = \Input::get('where');
		if(!empty($where)) {
            return \App\Produit::whereRaw($where)->get();
        }
		else {
            return \App\Produit::get();
        }
	}



    public function lastProducts(){
        $where = \Input::get('where');
        if(!empty($where)) {
            return \App\Produit::whereRaw($where)->get();
        }
        else {
            //dd(\App\Produit::lastProducts());
            return \App\Produit::lastProducts();
        }
    }


    public function bestProducts(){
        $where = \Input::get('where');
        if(!empty($where)) {
            return \App\Produit::whereRaw($where)->get();
        }
        else {
            return \App\Produit::bestProducts();
        }
    }


	/**
	 * GHet user by ID
	 *
	 * @return Response
	 */
	public function store()
	{

	}
	/**
	 * GHet user by ID
	 *
	 * @return Response
	 */
	public function destroy($produit)
	{

	}
	/**
	 * GHet user by ID
	 *
	 * @return Response
	 */
	public function update($produit)
	{

	}

}
