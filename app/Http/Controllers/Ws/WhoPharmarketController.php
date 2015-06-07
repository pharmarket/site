<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WhoPharmarketController extends Controller {
/**
	 * GHet WhoPharmarket by ID
	 *
	 * @return Response
	 */
	public function show($whoPharmarket)
	{
	}

    /**
	 * GHet WhoPharmarket
	 *
	 *	params where string
	 *
	 * @return Response
	 */
	public function index()
	{
		$where = \Input::get('where');
		if(!empty($where)) { return \App\WhoPharmarket::whereRaw($where)->get(); }
		else{ return \App\WhoPharmarket::with('langue')->get(); }
	}

	/**
	 * GHet WhoPharmarket by ID
	 *
	 * @return Response
	 */
	public function store()
	{
	}
	/**
	 * GHet WhoPharmarket by ID
	 *
	 * @return Response
	 */
	public function destroy($whoPharmarket)
	{
	}
	/**
	 * GHet WhoPharmarket by ID
	 *
	 * @return Response
	 */
	public function update($whoPharmarket)
	{
	}

}
