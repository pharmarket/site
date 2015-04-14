<?php namespace App\Http\Controllers;

class ContactController extends Controller {

	/**
	 * GHet contact by ID
	 *
	 * @return Response
	 */
	public function show($contact)
	{
		return $contact;
	}

	/**
	 * GHet contact by ID
	 *
	 *	params where string
	 *
	 * @return Response
	 */
	public function index()
	{

		$where = \Input::get('where');

		if(!empty($where)) { return \App\Contact::whereRaw($where)->get(); }
		else{ return \App\Contact::get(); }
	}

	/**
	 * GHet contact by ID
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = \Input::get('data');

		\App\Contact::create($data);
	}

	/**
	 * GHet contact by ID
	 *
	 * @return Response
	 */
	public function destroy($contact)
	{
		$contact->delete();
	}

	/**
	 * GHet contact by ID
	 *
	 * @return Response
	 */
	public function update($contact)
	{
		$data = \Input::get('data');

		$contact->update($data);
	}

}
