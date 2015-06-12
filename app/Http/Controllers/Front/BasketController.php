<?php namespace App\Http\Controllers\Front;

class BasketController extends Controller {

	/**
	 * Detruit un prduit dans le panier
	 *
	 * @return Response
	 */
	public function destroy($product)
	{
		\Cart::remove($product);
		return redirect()->back();
	}

	/**
	 * Envoie
	 *
	 * @return Response
	 */
	public function post()
	{
		//on enregistre le nouveau panier
		foreach (\Input::all() as $key => $qty) {
			//Si c'est un produit on met a jour lz panier
			if(strpos($key, 'produit') === 0){
				list(,$id) = explode("#", $key);

				// Récupération des stock sur le produit
				$exemplaire  = \DB::table('produit_exemplaire AS pe')
					->leftJoin('commande_exemplaire AS ce', 'pe.id', '=', 'ce.exemplaire_id')
					->where('produit_id',  \Cart::get($id)->id)
					->whereNull('ce.exemplaire_id')
					->count();

				//Si on a pas assez d'exemplaire, on lance une erreur
				if($exemplaire <  $qty){return back()->withErrors(['error' => \Lang::get('show.product_insufisant')]);}


				\Cart::update($id, ['qty' => $qty]);
			}
		}

		return \Redirect::route('purchase.address', compact('address'));
	}

	/**
	 * Retourn la liste des produits dans lle panier
	 *
	 * @return Response
	 */
	public function index()
	{
		$pays = \App\Pays::join('Langue', 'pays.langue_id', '=', 'Langue.id')->where('Langue.code', \Lang::getLocale())->first();

		return view('front.purchase.commande', compact('pays'));
	}




    /**
     * Ajout des produits dans le panier
     *
     * @return Response
     */
    public function store($produit)
    {
        //On verifie la quantité

	$langue = \App\Langue::where('code', \Lang::getLocale())->get()[0];
        $langue = \App\Langue::where('code', \Lang::getLocale())->get()[0];
        $media = \App\Media::where('produit_id', $produit->id)->where('default', 1)->first()->chemin;
        $nom = \App\Produit_info::where('produit_id', $produit->id)->where('langue_id', $langue->id)->first()->nom;

	// Récupération des stock sur le produit
	$exemplaire  = \DB::table('produit_exemplaire AS pe')
		->leftJoin('commande_exemplaire AS ce', 'pe.id', '=', 'ce.exemplaire_id')
		->where('produit_id', $produit->id)
		->whereNull('ce.exemplaire_id')
		->count();

	//On recupere le nombre de produit deja dans le panier
	$cart_row = \Cart::search(array('id' => $produit->id));
	$qty=0;
	if(!empty($cart_row)){$qty = \Cart::get($cart_row[0])->qty;}

	//Si on a pas assez d'exemplaire, on lance une erreur
	if($exemplaire <  \Input::get('quantite')+$qty){return back()->withErrors(['error' => \Lang::get('show.product_insufisant')]);}

        \Cart::add([
            ['id' => $produit->id, 'name' => $nom, 'qty' => \Input::get('quantite'), 'price' => $produit->montant, 'options' => array('logo' => $media)],
        ]);
        return back();
    }


}
