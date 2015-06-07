<?php namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WhoPharmarketController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $who = \App\WhoPharmarket::with('langue')->get();

        return view('front.whoPharmarket.whoPharmarket', compact('who'));
	}
}
