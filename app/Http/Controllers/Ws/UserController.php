<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {
/**
	 * GHet user by ID
	 *
	 * @return Response
	 */
	public function show($user)
	{
		return $user;
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
		if(!empty($where)) { return \App\User::whereRaw($where)->get(); }
		else{ return \App\User::get(); }
	}
	/**
	 * GHet user by ID
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = \Input::get('data');
		\App\User::create($data);
	}
	/**
	 * GHet user by ID
	 *
	 * @return Response
	 */
	public function destroy($user)
	{
		$user->delete();
	}
	/**
	 * GHet user by ID
	 *
	 * @return Response
	 */
	public function update($user)
	{
		$data = \Input::get('data');

		$user->update($data);
	}

}
