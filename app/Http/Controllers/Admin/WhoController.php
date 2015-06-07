<?php namespace App\Http\Controllers\admin;

use App\Cgu;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CguRequest;
use App\Http\Requests\EditCguRequest;
use App\Http\Requests\WhoRequest;
use App\WhoPharmarket;
use Illuminate\Http\Request;

class WhoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$who = \App\WhoPharmarket::with('langue')->get();

        return view('admin.who.who', compact('who'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        // fonction laravel lists permet de lister les donnée dans un tableau
        $langue = \App\Langue::lists('label', 'id');

        return view('admin.who.create', compact('langue'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(WhoRequest $request)
	{
        //dd($request->all());
        $who = new WhoPharmarket;
        $who->create($request->all());
        return redirect('/admin/who')->withFlashMessage("Création de la l'information effectué avec succes");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($who)
	{
        $who = \App\WhoPharmarket::find($who->id);
        return view('admin.who.show', compact('who'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($who)
	{
        $who = \App\WhoPharmarket::find($who->id);
        // fonction laravel lists permet de lister les donnée dans un tableau
        $langue = \App\Langue::lists('label', 'id');

        return view('admin.who.edit', compact('langue', 'who'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($who, WhoRequest $request)
	{
        $who->update($request->all());
        return redirect('/admin/who')->withFlashMessage("Mise à jour effectué avec succès");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($who)
	{
        $who->delete();
        return redirect()->back()->withFlashMessage("Suppression de l'information effectué avec succès");
	}

}
