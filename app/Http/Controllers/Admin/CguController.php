<?php namespace App\Http\Controllers\admin;

use App\Cgu;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CguRequest;
use App\Http\Requests\EditCguRequest;
use Illuminate\Http\Request;

class CguController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cgu = \App\Cgu::with('langue')->get();

        return view('admin.cgu.cgu', compact('cgu'));
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

        return view('admin.cgu.create', compact('langue'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CguRequest $request)
	{
        //dd($request->all());
        $cgu = new Cgu;
        $cgu->create($request->all());
        return redirect('/admin/cgu')->withFlashMessage("Création de la CGU effectué avec succes");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($cgu)
	{
        $cgu = Cgu::find($cgu->id);
        return view('admin.cgu.show', compact('cgu'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($cgu)
	{
        $cgu = Cgu::find($cgu->id);
        // fonction laravel lists permet de lister les donnée dans un tableau
        $langue = \App\Langue::lists('label', 'id');

        return view('admin.cgu.edit', compact('langue', 'cgu'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($cgu, EditCguRequest $request)
	{
        $cgu->update($request->all());
        return redirect('/admin/cgu')->withFlashMessage("Mise à jour effectué avec succès");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($cgu)
	{
        $cgu->delete();
        return redirect()->back()->withFlashMessage("Suppression de la CGU effectué avec succès");
	}

}
