<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CommandeRequest;
use App\Http\Requests\EditCommandeRequest;
use App\Http\Requests\ExemplaireRequest;
use App\Http\Requests\ImportCsvRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CommentaireController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $commentaire = \App\Commentaire::with('user', 'produit')->get();

        return View('admin.commentaire.commentaire', compact('commentaire'));
	}


    /**
     * Indique que le commentaire a été autorisé
     *
     * @param  int  $id
     * @return Response
     */
    public function done($commentaire)
    {
        $commentaire->done = 1;
        $commentaire->save();

        return redirect()->back();
    }



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($commentaire)
	{
        return View('admin.commentaire.show', compact('commentaire'));
	}




	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($commentaire)
	{
        $commentaire->delete();

        return redirect()->back()->withFlashMessage("Suppression du commentaire effectuée avec succès");
	}



}
