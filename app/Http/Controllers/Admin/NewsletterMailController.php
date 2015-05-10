<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\NewsletterMailRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class NewsletterMailController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{ 	
		$newsletter_mail = \App\Newsletter_mail::with('langue')->get();
		return view('admin.newsletter_mail.newsletter_mail', compact('newsletter_mail'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$langues = \App\Langue::lists('label', 'id');
		return View('admin.newsletter_mail.create', compact('langues'));	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(NewsletterMailRequest $request)
	{
		$newsletter_mail = new \App\Newsletter_mail;
		$newsletter_mail->create($request->all());	
		return redirect('/admin/newsletter_mail')->withFlashMessage("Création de la newsletter effectuée avec succès");
;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($newsletter_mail)
	{
		return View('admin.newsletter_mail.show', compact('newsletter_mail'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($newsletter_mail)
	{
			
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($newsletter_mail)
	{
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($newsletter_mail)
	{
		$newsletter_mail->delete();
		return redirect()->back()->withFlashMessage("Suppression de la neswletter effectuer avec succès");;
	}

}
