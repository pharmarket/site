<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CguController extends Controller {
/**
	 * GHet Cgu by ID
	 *
	 * @return Response
	 */
	public function show($cgu)
	{
	}

    /**
	 * GHet Cgu
	 *
	 *	params where string
	 *
	 * @return Response
	 */
	public function index()
	{
		$where = \Input::get('where');
		if(!empty($where)) { return \App\Cgu::whereRaw($where)->get(); }
		else{ return \App\Cgu::get(); }
	}

	/**
	 * GHet Cgu by ID
	 *
	 * @return Response
	 */
	public function store()
	{
	}
	/**
	 * GHet Cgu by ID
	 *
	 * @return Response
	 */
	public function destroy($cgu)
	{
	}
	/**
	 * GHet Cgu by ID
	 *
	 * @return Response
	 */
	public function update($cgu)
	{
	}

}
