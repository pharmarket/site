<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contact =  \App\Contact::get();
		return view('admin.contact.contact', compact('contact'));
	}

	/**
	 * Indique que le contact a été traité
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function done($contact)
	{
		$contact->done = 1;
		$contact->save();

		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($contact)
	{
		$contact->delete();

		return redirect()->back();
	}

	/**
	 * Envoie un mail à la demande de contact
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function mail($contact)
	{
		//Verification :requete type post + content non vide

		//evoir du mail
		\Mail::send('mail.contact', ['content' => \Input::get('content')], function($message) use ($contact){
		    $message->to($contact->mail, '')->subject('Reponse à votre demande de contact');
		});
		if(\Input::get('done')){
			$contact->done = 1;
			$contact->save();
		}

		return redirect()->back();
	}
}
