<?php namespace App\Http\Controllers\Front;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentaireRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProduitController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $produit = \App\Produit::with('categorie', 'sous_categorie', 'marque', 'media', 'info', 'langues', 'fournisseurs')->get();
        $produit_categorie = \App\Produit_categorie::with('sous_categorie', 'langue')->get();
        $sous_categorie = \App\Sous_categorie::with('langue')->get();
        $produit_info = \App\Produit_info::with('langue')->get();

        // Pagination
        $product = \App\Produit::paginate(9);
        $product->setPath('/site/public/produit');

        return View('front.produit.produit', compact('produit', 'produit_categorie', 'sous_categorie', 'produit_info', 'product'));
    }
    /**
     * @param $categorie
     * @return \Illuminate\View\View
     */
    public function callCategorie($sous_categorie){
        /**
         * Affichage des produits selon la categorie
         */
        $produit = \App\Produit::with('categorie', 'sous_categorie', 'marque', 'media', 'info', 'langues', 'fournisseurs')->where('sous_categorie_id', '=', $sous_categorie->id)->get();
        $produit_categorie = \App\Produit_categorie::with('sous_categorie', 'langue')->get();
        $sous_categorie = \App\Sous_categorie::with('langue')->get();
        $produit_info = \App\Produit_info::with('langue')->get();

        // Pagination
        $product = \App\Produit::paginate(9);
        $product->setPath('/site/public/produit');

        return View('front.produit.categories', compact('produit', 'produit_categorie', 'sous_categorie', 'produit_info', 'product'));
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
        $langue = \App\Langue::where('code', \Lang::getLocale())->get()[0];

        // Récupération info langue
        $produit_categorie = \App\Produit_categorie::with('sous_categorie', 'langue')->get();
        $sous_categorie = \App\Sous_categorie::with('langue')->get();
        $produit_info = \App\Produit_info::where('langue_id', $langue->id)->where('produit_id', $produit->id)->get()[0];
        $taux = \App\Devise::where('symbole', \Lang::get('menu.devise'))->get()[0]->taux;
        $montant = $taux * $produit->montant;

        // Récupération des stock sur le produit
        $exemplaire  = \DB::table('produit_exemplaire AS pe')
            ->leftJoin('commande_exemplaire AS ce', 'pe.id', '=', 'ce.exemplaire_id')
            ->where('produit_id', $produit->id)
            ->whereNull('ce.exemplaire_id')
            ->count();

        // RESS
        $res = \App\Media::where('produit_id', '=', $produit->id)->get();
        $countImage = \App\Media::where('produit_id', '=', $produit->id)->where('type', '=', 'image')->count();
        $countVideo = \App\Media::where('produit_id', '=', $produit->id)->where('type', '=', 'video')->count();

        // Livreur
        $livreur_info = \App\Livreur_info::with('langue', 'livreur')->where('langue_id', $langue->id)->get();


        return View('front.produit.show', compact('produit', 'commentaire', 'produit_categorie', 'sous_categorie', 'produit_info', 'exemplaire', 'montant', 'res', 'livreur_info', 'countImage', 'countVideo'));
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
}