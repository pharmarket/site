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
		// \Cart::add([
		// 	['id' => '41', 'name' => 'Product 1', 'qty' => 1, 'price' => 10.00, 'options' => array('logo' => 'img/produit1.jpg')],
		// 	['id' => '42', 'name' => 'Product 2', 'qty' => 1, 'price' => 10.00, 'options' => array('logo' => 'img/produit2.jpg')]
		// ]);
		return view('front.purchase.commande');
	}

}
