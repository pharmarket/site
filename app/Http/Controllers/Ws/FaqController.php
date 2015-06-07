<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FaqController extends Controller {
    /**
	 * GHet Faq by ID
	 *
	 * @return Response
	 */
	public function show($faq)
	{
	}
    
	/**
	 * GHet Faq by ID
	 *
	 *	params where string
	 *
	 * @return Response
	 */
	public function index()
	{
		$where = \Input::get('where');
		if(!empty($where)) { return \App\User::whereRaw($where)->get(); }
		else{ return \App\User::get(); }
	}

	/**
	 * GHet Faq by ID
	 *
	 * @return Response
	 */
	public function store()
	{
	}

	/**
	 * GHet Faq by ID
	 *
	 * @return Response
	 */
	public function destroy($faq)
	{
	}

	/**
	 * GHet Faq by ID
	 *
	 * @return Response
	 */
	public function update($faq)
	{
	}

}
