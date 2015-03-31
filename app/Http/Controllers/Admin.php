<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Admin extends Controller {
	public function index()
	{
    	// /*** si pas log**/
     //    return 'admin login';
     //    /*** si log return dashbord ? *****/ 
		return view('admin.index');
	}

}
