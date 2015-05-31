<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*** Partie admin mettre un commentaire sur chaque route pour connaitre l'avancement ***/
Route::group(['prefix' => 'admin'], function(){
        Route::group(['middleware' => 'auth', 'roles' => ['admin']], function(){
            Route::get('/', [ 'as' => 'accueil', 'uses' => 'Admin@index']);
            Route::resource('contact', 'Admin\ContactController', ['only' => ['destroy', 'index']]);
            Route::get('contact/done/{contact}', ['as' => 'admin.contact.done', 'uses' => 'Admin\ContactController@done']);
            Route::post('contact/mail/{contact}', ['as' => 'admin.contact.mail', 'uses' => 'Admin\ContactController@mail']);
        	  Route::resource('newsletter_mail', 'Admin\NewsletterMailController');
            Route::get('newsletter/history', ['as' => 'admin.newsletter.history', 'uses' => 'Admin\NewsletterController@history']);
            Route::resource('newsletter', 'Admin\NewsletterController');
            Route::resource('cgu', 'Admin\CguController');
            Route::resource('cgv', 'Admin\CgvController');
            Route::resource('faq', 'Admin\FaqController');


            Route::post('produit/upload', ['as' => 'admin.produit.upload', 'uses' => 'Admin\ProduitController@upload']);
            Route::post('produit/delete', ['as' => 'admin.produit.delete', 'uses' => 'Admin\ProduitController@delete']);

            Route::get('produit/importCSV', ['as' => 'admin.produit.importCSV', 'uses' => 'Admin\ProduitController@importCSV']);
            Route::post('produit/importCsvProduits', ['as' => 'admin.produit.importCsvProduits', 'uses' => 'Admin\ProduitController@importCsvProduits']);
            Route::post('produit/importCsvExemplaires', ['as' => 'admin.produit.importCsvExemplaires', 'uses' => 'Admin\ProduitController@importCsvExemplaires']);
            Route::post('produit/importCsvMarques', ['as' => 'admin.produit.importCsvMarques', 'uses' => 'Admin\ProduitController@importCsvMarques']);
            Route::post('produit/importCsvFournisseurs', ['as' => 'admin.produit.importCsvFournisseurs', 'uses' => 'Admin\ProduitController@importCsvFournisseurs']);
            Route::post('produit/importCsvProduitsInfos', ['as' => 'admin.produit.importCsvProduitsInfos', 'uses' => 'Admin\ProduitController@importCsvProduitsInfos']);
            Route::get('produit/exportCSV', ['as' => 'admin.produit.exportCSV', 'uses' => 'Admin\ProduitController@exportCSV']);
            Route::post('produit/exportCsvProduitsInfos', ['as' => 'admin.produit.exportCsvProduitsInfos', 'uses' => 'Admin\ProduitController@exportCsvProduitsInfos']);
            Route::post('produit/exportCsvExemplairesInfos', ['as' => 'admin.produit.exportCsvExemplairesInfos', 'uses' => 'Admin\ProduitController@exportCsvExemplairesInfos']);
            Route::resource('produit', 'Admin\ProduitController');

            Route::post('exemplaire/importCSV', ['as' => 'admin.exemplaire.importCSV', 'uses' => 'Admin\ExemplaireController@importCSV']);
            Route::get('exemplaire/listing_exemplaires/{idProduit}', ['as' => 'admin.exemplaire.listingExemplaires', 'uses' => 'Admin\ExemplaireController@listingExemplaires']);
            Route::resource('exemplaire', 'Admin\ExemplaireController');

            Route::resource('posologie', 'Admin\PosologieController');
            Route::resource('posologie_sex', 'Admin\PosologieSexController');


            Route::get('vente/exemplaireVente', ['as' => 'vente.getExemplaireVente', 'uses' => 'Admin\VenteController@getExemplaireVente']);
            Route::post('vente/exemplaireVente', ['as' => 'vente.exemplaireVente', 'uses' => 'Admin\VenteController@exemplaireVente']);

            Route::get('vente/exportcsv', ['as' => 'vente.getExportCSV', 'uses' => 'Admin\VenteController@getExportCSV']);
            Route::post('vente/exportCSV', ['as' => 'vente.exportCSV', 'uses' => 'Admin\VenteController@exportCSV']);

            Route::get('vente/importcsv', ['as' => 'vente.getImportCSV', 'uses' => 'Admin\VenteController@getImportCSV']);
            Route::post('vente/importCSV', ['as' => 'vente.importCSV', 'uses' => 'Admin\VenteController@importCSV']);
            Route::post('vente/importCSV', ['as' => 'vente.importCSVEV', 'uses' => 'Admin\VenteController@importCSVEV']);

            Route::resource('vente', 'Admin\VenteController');

	});
});

Route::group(['prefix' => 'ws', 'middleware' => 'ws'], function(){
            Route::resource('contact', 'Ws\ContactController', ['only' => ['store']]);;
            Route::resource('user', 'Ws\UserController');
});



Route::group(['middleware' => 'language'], function(){
	Route::get('produit', function(){
	     	return View::make('front.produit.produit');
	});
    Route::get('mon-compte', function()
    {
        return View::make('front.compte.compte');
    });
	Route::get('faq', function(){
	    	return View::make('front.faq.faq');
	});
	Route::get('commande', function(){
	    	return View::make('front.commande.adresse');
	});

    Route::match(['get', 'post'],'contact',['as' => 'contact', 'uses' => 'Front\ContactController@index']);

	//Route pour le panier
	Route::get('basket/{basket}', ['as' => 'basket.destroy', 'uses' => 'Front\BasketController@destroy']);
	Route::get('basket', ['as' => 'basket.index', 'uses' => 'Front\BasketController@index']);
	Route::post('basket', ['as' => 'basket.post', 'uses' => 'Front\BasketController@post']);
	Route::post('basket/store/{produit}', ['as' => 'basket.store', 'uses' => 'Front\BasketController@store']);
	Route::group(['middleware' => 'auth', 'roles' => ['customer']], function(){
		//Route pour la commande
		Route::get('purchase/address', ['as' => 'purchase.address', 'uses' => 'Front\PurchaseController@address']);
		Route::get('purchase/livraison', ['as' => 'purchase.livraison', 'uses' => 'Front\PurchaseController@livraison']);
		Route::post('purchase/livraison', ['as' => 'purchase.livraison.post', 'uses' => 'Front\PurchaseController@livraisonPost']);
		Route::get('purchase/payment', ['as' => 'purchase.payment', 'uses' => 'Front\PurchaseController@payment']);
		Route::post('purchase/confirm', ['as' => 'purchase.confirm', 'uses' => 'Front\PurchaseController@confirm']);
		Route::get('purchase/suivi', ['as' => 'purchase.suivi', 'uses' => 'Front\PurchaseController@suivi']);
		Route::get('purchase/cancel', ['as' => 'purchase.cancel', 'uses' => 'Front\PurchaseController@cancel']);
		Route::get('purchase/return', ['as' => 'purchase.return', 'uses' => 'Front\PurchaseController@retour']);
		Route::match(['get', 'post'], 'account', ['as' => 'user.account', 'uses' => 'UserController@suscribe']);
		Route::get('user/home', ['as' => 'user.home', 'uses' => 'UserController@home']);
	});


    // Route pour la recherche
    Route::get('resultat', [ 'as' => 'front.recherche.resultat', 'uses' => 'Front\RechercheController@resultat']);
    // Route::get('resultat', [ 'as' => 'front.recherche.resultat', 'uses' => 'Front\RechercheController@index']);

    //Route pour les CGU et CGV
    Route::get('cgu', ['as' => 'cgu.index', 'uses' => 'Front\CguController@index']);
    Route::get('cgv', ['as' => 'cgv.index', 'uses' => 'Front\CgvController@index']);

	Route::get('whoPharmarket', ['as' => 'whoPharmarket.index', 'uses' => 'Front\WhoPharmarketController@index']);
    Route::get('charterQuality', ['as' => 'charterQuality.index', 'uses' => 'Front\CharterQualityController@index']);

    //Route pour le FAQ
    Route::get('faq', ['as' => 'faq.index', 'uses' => 'Front\FaqController@index']);

    //Route pour le produit
    Route::get('categorie/{sous_categorie?}', ['as' => 'produit.callCategorie', 'uses' => 'Front\ProduitController@callCategorie']);
    Route::get('produit/{produit}', ['as' => 'produit.show', 'uses' => 'Front\ProduitController@show']);
    Route::post('produit', ['as' => 'produit.store', 'uses' => 'Front\ProduitController@store']);
    Route::get('commentaire/{commentaire}', ['as' => 'produit.destroy', 'uses' => 'Front\ProduitController@destroy']);

    Route::get('logout', ['as' => 'user.logout', 'uses' => 'UserController@logout']);
    //Route de gestion de  la connexion
    Route::match(['get', 'post'], 'login', ['as' => 'user.login', 'uses' => 'UserController@login']);
    Route::match(['get', 'post'], 'suscribe', ['as' => 'user.suscribe', 'uses' => 'UserController@suscribe']);
    Route::get('language/{langue}', ['as' => 'user.language', 'uses' => 'UserController@language']);

  Route::get('/', ['as' => 'home', 'uses' => 'Front\HomeController@index']);
});
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
