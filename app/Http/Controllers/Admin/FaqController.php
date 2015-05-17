<?php namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use Illuminate\Http\Request;

class FaqController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$faq = \App\Faq::with('langue')->get();

        return view('admin.faq.faq', compact('faq'));
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
        if(\App\Faq::with('langue')->count() == NULL){
            $order = 1;
        }else{
            $order = \App\Faq::with('langue')->count();
        }

        return view('admin.faq.create', compact('langue', 'order'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(FaqRequest $request)
	{
        //dd($request->all());
        $faq = new \App\Faq;
        $faq->create($request->all());
        return redirect('/admin/faq')->withFlashMessage("Création de la FAQ effectué avec succes");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($faq)
	{
        $faq = \App\Faq::find($faq->id);
        return view('admin.faq.show', compact('faq'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($faq)
	{
        $faq = \App\Faq::find($faq->id);
        // fonction laravel lists permet de lister les donnée dans un tableau
        $langue = \App\Langue::lists('label', 'id');
        $order = \App\Faq::with('langue')->count();

        return view('admin.faq.edit', compact('langue', 'order', 'faq'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($faq, FaqRequest $request)
	{
        $faq->update($request->all());
        return redirect('/admin/faq')->withFlashMessage("Mise à jour effectué avec succès");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($faq)
	{
        $faq->delete();
        return redirect()->back()->withFlashMessage("Suppression de la FAQ effectué avec succès");
	}

}
