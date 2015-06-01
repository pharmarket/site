<?php namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FaqController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$faq = \App\Faq::with('langue')->orderBy('order', 'asc')->get();

        return view('front.faq.faq', compact('faq'));
	}

}
