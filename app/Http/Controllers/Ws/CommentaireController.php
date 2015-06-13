<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CommentaireController extends Controller {
/**
	 * GHet Commentaire by ID
	 *
	 * @return Response
	 */
	public function show($commentaire)
	{
	}

    /**
	 * GHet Commentaire
	 *
	 *	params where string
	 *
	 * @return Response
	 */
	public function index()
	{
		$where = \Input::get('where');
		if(!empty($where)) { return \App\Commentaire::whereRaw($where)->get(); }
		else{ return \App\Commentaire::with('user', 'produit')->orderBy('id', 'desc')->get(); }
	}

	/**
	 * GHet Commentaire by ID
	 *
	 * @return Response
	 */
	public function store()
	{
	}
	/**
	 * GHet Commentaire by ID
	 *
	 * @return Response
	 */
	public function destroy($commentaire)
	{
	}
	/**
	 * GHet Commentaire by ID
	 *
	 * @return Response
	 */
	public function update($commentaire)
	{
	}

}
