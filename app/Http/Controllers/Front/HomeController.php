<?php namespace App\Http\Controllers\Front;
use App\Produit as Produit;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lastProducts = Produit::lastProducts();
		$bestProducts = Produit::bestProducts();

		return view('front.home.home', compact('lastProducts','bestProducts'));
	}

}
