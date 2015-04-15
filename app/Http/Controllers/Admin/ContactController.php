<?php namespace App\Http\Controllers\Admin;

class ContactController extends Controller {
	public function index() {
		$contact =  \App\Contact::get();
		return view('admin.contact.contact', compact('contact'));
	}
}
