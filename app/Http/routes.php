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
            Route::resource('newsletter', 'Admin\NewsletterController');
            Route::get('newsletter/history', ['as' => 'admin.newsletter.history', 'uses' => 'Admin\NewsletterController@history']);

            Route::resource('cgu', 'Admin\CguController');
            Route::resource('cgv', 'Admin\CgvController');

            Route::resource('faq', 'Admin\FaqController');
	});
});


Route::group(['prefix' => 'forum'], function()
{
    Route::get('/', function()
    {
        return 'le forum';
    });

    Route::get('sujet', function()
    {
        return 'les sujets';
    });

    Route::get('message', function()
    {
         return 'les messages';
    });
    Route::get('profil', function()
    {
         return 'le profil';
    });
});



Route::group(['middleware' => 'language'], function(){
    Route::get('categorie', function()
    {
        return 'la categorie';
    });
    Route::get('produit', function()
    {
         return View::make('front.produit.produit');
    });
    Route::get('mon-compte', function()
    {
        return View::make('front.compte.compte');
    });
    Route::get('faq', function()
    {
        return View::make('front.faq.faq');
    });
    Route::get('commande', function()
    {
        return View::make('front.commande.adresse');
    });

    Route::get('contact',['as' => 'contact', 'uses' => 'ContactController@index']);

    Route::get('contact2', function(){
        return View::make('front.contact.contact2');
    });

    //Route pour le panier
    Route::get('basket/{basket}', ['as' => 'basket.destroy', 'uses' => 'Front\BasketController@destroy']);
    Route::get('basket', ['as' => 'basket.index', 'uses' => 'Front\BasketController@index']);
    Route::post('basket', ['as' => 'basket.post', 'uses' => 'Front\BasketController@post']);
    Route::group(['middleware' => 'auth', 'roles' => ['customer']], function(){
        //Route pour la commande
        Route::get('purchase/address', ['as' => 'purchase.address', 'uses' => 'Front\PurchaseController@address']);
        Route::get('purchase/livraison', ['as' => 'purchase.livraison', 'uses' => 'Front\PurchaseController@livraison']);
        Route::post('purchase/livraison', ['as' => 'purchase.livraison.post', 'uses' => 'Front\PurchaseController@livraisonPost']);
        Route::get('purchase/payment', ['as' => 'purchase.payment', 'uses' => 'Front\PurchaseController@payment']);
        Route::post('purchase/confirm', ['as' => 'purchase.confirm', 'uses' => 'Front\PurchaseController@confirm']);
        Route::get('purchase/cancel', ['as' => 'purchase.cancel', 'uses' => 'Front\PurchaseController@cancel']);
        Route::get('purchase/return', ['as' => 'purchase.return', 'uses' => 'Front\PurchaseController@retour']);
        Route::match(['get', 'post'], 'account', ['as' => 'user.account', 'uses' => 'UserController@suscribe']);
    });


    //Route pour les CGU et CGV
    Route::get('cgu', ['as' => 'cgu.index', 'uses' => 'Front\CguController@index']);
    Route::get('cgv', ['as' => 'cgv.index', 'uses' => 'Front\CgvController@index']);

    //Route pour le FAQ
    Route::get('faq', ['as' => 'faq.index', 'uses' => 'Front\FaqController@index']);



    Route::get('logout', ['as' => 'user.logout', 'uses' => 'UserController@logout']);
    //Route de gestion de  la connexion
    Route::match(['get', 'post'], 'login', ['as' => 'user.login', 'uses' => 'UserController@login']);
    Route::match(['get', 'post'], 'suscribe', ['as' => 'user.suscribe', 'uses' => 'UserController@suscribe']);
    Route::get('language/{langue}', ['as' => 'user.language', 'uses' => 'UserController@language']);

    Route::get('/', ['as' => 'home', function(){
            return View::make('front.home.home');
    }]);
});
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
