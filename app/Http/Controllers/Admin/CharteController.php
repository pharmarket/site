<?php namespace App\Http\Controllers\admin;

use App\Cgv;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CgvRequest;
use App\Http\Requests\CharteRequest;
use App\Http\Requests\EditCgvRequest;
use Illuminate\Http\Request;

class CharteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $charte = \App\CharteQ::with('langue')->get();

        return view('admin.charte.charte', compact('charte'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($charte)
    {
        $charte = \App\CharteQ::find($charte->id);
        return view('admin.charte.show', compact('charte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($charte)
    {
        $charte = \App\CharteQ::find($charte->id);
        // fonction laravel lists permet de lister les donnée dans un tableau
        $langue = \App\Langue::lists('label', 'id');

        return view('admin.charte.edit', compact('langue', 'charte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($charte, CharteRequest $request)
    {
        $charte->update($request->all());
        return redirect('/admin/charte')->withFlashMessage("Mise à jour effectué avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($charte)
    {
        $charte->delete();
        return redirect()->back()->withFlashMessage("Suppression de la charte effectué avec succès");
    }

}
