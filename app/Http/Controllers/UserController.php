<?php namespace App\Http\Controllers;

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
	* params where string
	*
	* @return Response
	*/
	public function index()
	{
		$where = \Input::get('where');
		if(!empty($where)) { return \User::whereRaw($where)->get(); }
		else{ return \User::get(); }
	}
	/**
	* GHet user by ID
	*
	* @return Response
	*/
	public function store()
	{
		$data = \Input::get('data');
		\User::create($data);
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
	* Get user by ID
	*
	* @return Response
	*/
	public function update($user)
	{
		$data = \Input::get('data');
		$user->update($data);
	}
}
