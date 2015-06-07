<?php namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CharterQualityController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $charte = \App\CharteQ::with('langue')->get();

        return view('front.charterQuality.charterQuality', compact('charte'));
	}
}
