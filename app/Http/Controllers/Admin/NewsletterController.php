<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\NewsletterRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class NewsletterController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$newsletter = \App\Newsletter::with('langue')->get();
		
		return view('admin.newsletter.newsletter', compact('newsletter'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$langues = \App\Langue::lists('label', 'id');
		return View('admin.newsletter.create', compact('langues'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(NewsletterRequest $request)
	{
		// Enregistrement dans la table Newsletter
		$newsletter = new \App\Newsletter;
		$newsletter->create($request->all());
		return redirect('/admin/newsletter')->withFlashMessage("Création de la newsletter effectuée avec succès");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($newsletter)
	{
		return View('admin.newsletter.show', compact('newsletter'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($newsletter)
	{
		// Récuperer Langues
		$langues = \App\Langue::lists('code', 'id');

		return View('admin.newsletter.edit', compact('newsletter', 'langues'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($newsletter)
	{
		$newsletter->delete();
		return redirect()->back()->withFlashMessage("Suppression de la neswletter effectuer avec succès");
	}

	/**
	 * Display a listing of the history.
	 *
	 * @return Response
	 */
	public function history()
	{
		//$newsletter = \App\Newsletter::with('langue')->where('send_at', '<', new \DateTime('today'))->get();
		$newsletter = \App\Newsletter::with('langue')->where('send_at', '!=', '0000-00-00 00:00:00')->get();
		
		return view('admin.newsletter.history', compact('newsletter'));
	}

}
