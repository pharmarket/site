<?php

class ProductTest extends TestCase {

	/**
	 * Vérification de reactions quand un produit existe et quand il n'existe pas
	 *
	 * @return void
	 */
	public function testExist(){
		//Un produit qui existe
		$response = $this->call('GET', 'produit/167');
		$this->assertResponseStatus(200);

		//Un produit qui n'existe pas
		$response = $this->call('GET', 'produit/9000');
		$this->assertResponseStatus(404);
	}

	/**
	 * Verification de l'ajout d'un produit dans le panier
	 *
	 * @return void
	 */
	public function testPanier()
	{
		\Session::start(); // Start a session for the current test

		//On crée un produit pour les tests
		$produit = \DB::table('produit')->insertGetId(['categorie_id' => 52, 'sous_categorie_id' => 26, 'marque_id' => 12, 'reference' => 'refTest', 'montant' => 50, 'notice' => 'notice.pdf']);

		//On créé un exemplaire
		$exemplaire = \DB::table('produit_exemplaire')->insertGetId(['produit_id' => $produit, 'reference' => 'refTest',  'peremption_at' => \DB::raw('NOW()')]);

		//On créé les info
		$info = \DB::table('produit_info')->insertGetId(['produit_id' => $produit, 'langue_id' => 2, 'nom' => 'NameTest', 'description' => 'Description for a test']);

		//On créé un media
		$media = \DB::table('media')->insertGetId(['produit_id' => $produit, 'type' => 'image',  'chemin' => 'path/image.jpg', 'default' => 1]);

		//ONtente de rentrer le produit dans le panier
		$response = $this->call('POST', 'basket/store/'.$produit, ['_token' => csrf_token(), 'quantite' => 1]);

		//On verifie que le produit est ajouté
		$this->assertEquals(\Cart::count(), 1);

		//ONtente de rentrer le produit dans le panier
		$response = $this->call('POST', 'basket/store/'.$produit, ['_token' => csrf_token(), 'quantite' => 1]);

		//On verifie que le produit est ajouté
		$this->assertEquals(\Cart::count(), 1);

		//On supprimer le panier
		\Cart::destroy();

		//On supprime le media
		\DB::table('produit_info')->where('id', $info)->delete();

		//On supprime le media
		\DB::table('media')->where('id', $media)->delete();

		//On supprime l'exemplaire
		\DB::table('produit_exemplaire')->where('id', $exemplaire)->delete();

		//On supprime le produit
		\DB::table('produit')->where('id', $produit)->delete();
	}

}
