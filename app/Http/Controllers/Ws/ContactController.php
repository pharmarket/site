<?php namespace App\Http\Controllers\Ws;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactController extends Controller {

	/**
	 * Store contact
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = \Input::get('data');

		\App\Contact::create($data);
	}

}
