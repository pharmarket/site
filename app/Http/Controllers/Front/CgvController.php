<?php namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CgvController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{ 
		$cgv = \App\Cgv::with('langue')->get();

        return view('front.cgv.cgv', compact('cgv'));
	}

}
