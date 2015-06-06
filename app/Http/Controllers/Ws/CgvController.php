<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CgvController extends Controller {

    /**
	 * GHet Cgv by ID
	 *
	 * @return Response
	 */
	public function show($cgv)
	{
	}

	/**
	 * GHet Cgv
	 *
	 *	params where string
	 *
	 * @return Response
	 */
	public function index()
	{
		$where = \Input::get('where');
		if(!empty($where)) { return \App\Cgv::whereRaw($where)->get(); }
		else{ return \App\Cgv::get(); }
	}

	/**
	 * GHet Cgv by ID
	 *
	 * @return Response
	 */
	public function store()
	{
	}

	/**
	 * GHet Cgv by ID
	 *
	 * @return Response
	 */
	public function destroy($cgv)
	{
	}

	/**
	 * GHet Cgv by ID
	 *
	 * @return Response
	 */
	public function update($cgv)
	{
	}

}
