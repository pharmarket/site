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
		\Cart::add([
			['id' => '108', 'name' => 'Product 1', 'qty' => 1, 'price' => 10.00, 'options' => array('logo' => 'img/produit1.jpg')],
			// ['id' => '42', 'name' => 'Product 2', 'qty' => 1, 'price' => 10.00, 'options' => array('logo' => 'img/produit2.jpg')]
		]);
		return view('front.purchase.commande');
	}




    /**
     * Ajout des produits dans le panier
     *
     * @return Response
     */
    public function store($produit)
    {
        //On verifie la quantité
        \Input::get('quantite');
        $taux = \App\Devise::where('symbole', \Lang::get('menu.devise'))->get()[0]->taux;
        $montant = $taux * $produit->montant;
        $langue = \App\Langue::where('code', \Lang::getLocale())->get()[0];
        dd($produit);
        \Cart::add([
            ['id' => $produit->id, 'name' => 'Product 1', 'qty' => \Input::get('quantite'), 'price' => $montant, 'options' => array('logo' => 'img/produit1.jpg')],
            // ['id' => '42', 'name' => 'Product 2', 'qty' => 1, 'price' => 10.00, 'options' => array('logo' => 'img/produit2.jpg')]
        ]);
        // return view('front.purchase.commande');
    }


}
