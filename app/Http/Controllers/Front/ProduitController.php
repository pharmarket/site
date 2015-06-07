<?php namespace App\Http\Controllers\Front;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentaireRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProduitController extends Controller {
	/**
	 * @param $categorie
	 * @return \Illuminate\View\View
	 */
	public function callCategorie($sous_categorie=null){
		/**
		* Affichage des produits selon la categorie
		*/
		if(!empty($sous_categorie)){
			$produit = \App\Produit::where('sous_categorie_id', '=', $sous_categorie->id)->get();
		}else{
			$produit = \App\Produit::with('categorie', 'sous_categorie', 'marque', 'media', 'info', 'langues', 'fournisseurs')->get();
		}

		// Recupère le nombre d'exemplaires par produit
		$tabNbExemplairesProduit = array();
		foreach($produit as $row){
			$nbExemplairesProduit 	= \DB::table('produit_exemplaire')
				        			->join('produit', 'produit_exemplaire.produit_id', '=', 'produit.id')
				                	->select('produit_exemplaire.produit_id', 'produit.reference', \DB::raw('count(produit_exemplaire.id) as total'), 'produit.montant')
				                 	->where('produit_exemplaire.produit_id', $row->id)
				                 	->whereNotIn('produit_exemplaire.id',function($q){
										$q->select('exemplaire_id')->from('commande_exemplaire');
									})
				                 	->get();
			$tabNbExemplairesProduit[] = $nbExemplairesProduit;
    	}

		$langue_id = \App\Langue::where('code', \Lang::getLocale())->get()[0]->id;

		$produit_categorie = \App\Produit_categorie::where('langue_id', $langue_id)->get();
		$sous_categorie = \App\Sous_categorie::where('langue_id', $langue_id)->get();

		// Pagination

		$produit = $produit->paginate(3);
	//	$produit->setPath('/site/public/produit');


		return View('front.produit.categories', compact('produit', 'produit_categorie', 'sous_categorie', 'product', 'tabNbExemplairesProduit'));
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
    public function store(CommentaireRequest $request)
    {
        $commentaire = new \App\Commentaire;
        $commentaire->create($request->all());

        return redirect()->back()->withFlashMessage("Création du commentaire effectué avec succes");
    }
	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function show($produit)
	{
		// List des commentaire de l'ut
		$commentaire = \App\Commentaire::with('user', 'produit')->orderBy('id', 'desc')->where('produit_id', '=', $produit->id)->get();
		$langue = \App\Langue::where('code', \Lang::getLocale())->first();

		// Récupération info langue
		$produit_categorie = \App\Produit_categorie::with('sous_categorie', 'langue')->get();
		$sous_categorie = \App\Sous_categorie::with('langue')->get();
		$produit_info = \App\Produit_info::where('langue_id', $langue->id)->where('produit_id', $produit->id)->first();
		$taux = \App\Devise::where('symbole', \Lang::get('menu.devise'))->first()->taux;
		$montant = $taux * $produit->montant;

		// Récupération des stock sur le produit
		$exemplaire  = \DB::table('produit_exemplaire AS pe')
			->leftJoin('commande_exemplaire AS ce', 'pe.id', '=', 'ce.exemplaire_id')
			->where('produit_id', $produit->id)
			->whereNull('ce.exemplaire_id')
			->count();

		// RESS
		$res = \App\Media::where('produit_id', '=', $produit->id)->get();
		$countImage = \App\Media::where('produit_id', '=', $produit->id)->where('type', '=', 'image')->where('langue_id', $langue->id)->count();
		$countVideo = \App\Media::where('produit_id', '=', $produit->id)->where('type', '=', 'video')->where('langue_id', $langue->id)->count();

		return View('front.produit.show', compact('produit', 'commentaire', 'produit_categorie', 'sous_categorie', 'produit_info', 'exemplaire', 'montant', 'res', 'countImage', 'countVideo'));
	}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update()
    {
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($commentaire)
    {
        // suppression du commentaire écrit
        $commentaire->delete();

        return redirect()->back()->withFlashMessage("Suppression du commentaire effectué avec succès");
    }

    public function alertDispo($idProduit)
    {	
    	// Ajout de l'identifiant du client et du produit en base de données
    	$return_stock = new \App\Return_stock;
    	$return_stock->user_mail  = Auth::user()->mail;
    	$return_stock->produit_id = $idProduit;
    	$return_stock->save();

    	return redirect()->back()->withFlashMessage("Vous recevrez un mail dès que notre produit sera en stock.");
    }
}
