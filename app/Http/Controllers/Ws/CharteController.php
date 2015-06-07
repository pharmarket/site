<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CharteController extends Controller {
/**
	 * GHet Charte by ID
	 *
	 * @return Response
	 */
	public function show($charte)
	{
	}

    /**
	 * GHet Charte
	 *
	 *	params where string
	 *
	 * @return Response
	 */
	public function index()
	{
		$where = \Input::get('where');
		if(!empty($where)) { return \App\CharteQ::whereRaw($where)->get(); }
		else{ return \App\CharteQ::get(); }
	}

	/**
	 * GHet Charte by ID
	 *
	 * @return Response
	 */
	public function store()
	{
	}
	/**
	 * GHet Charte by ID
	 *
	 * @return Response
	 */
	public function destroy($charte)
	{
	}
	/**
	 * GHet Charte by ID
	 *
	 * @return Response
	 */
	public function update($charte)
	{
	}

}
