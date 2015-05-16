<?php namespace App\Http\Controllers\admin;

use App\Cgv;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CgvRequest;
use App\Http\Requests\EditCgvRequest;
use Illuminate\Http\Request;

class CgvController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $cgv = \App\Cgv::with('langue')->get();

        return view('admin.cgv.cgv', compact('cgv'));
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

        return view('admin.cgv.create', compact('langue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CgvRequest $request)
    {
        //dd($request->all());
        $cgv = new Cgv;
        $cgv->create($request->all());
        return redirect('/admin/cgv')->withFlashMessage("Création de la CGV effectué avec succes");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($cgv)
    {
        $cgv = Cgv::find($cgv->id);
        return view('admin.cgv.show', compact('cgv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($cgv)
    {
        $cgv = Cgv::find($cgv->id);
        // fonction laravel lists permet de lister les donnée dans un tableau
        $langue = \App\Langue::lists('label', 'id');

        return view('admin.cgv.edit', compact('langue', 'cgv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($cgv, EditCgvRequest $request)
    {
        $cgv->update($request->all());
        return redirect('/admin/cgv')->withFlashMessage("Mise à jour effectué avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($cgv)
    {
        $cgv->delete();
        return redirect()->back()->withFlashMessage("Suppression de la CGV effectué avec succès");
    }

}
