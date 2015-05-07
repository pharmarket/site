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
    Route::get('/', [ 'as' => 'accueil', 'uses' => 'Admin@index']);
    Route::resource('contact', 'Admin\ContactController', ['only' => ['destroy', 'index']]);
    Route::get('contact/done/{contact}', ['as' => 'admin.contact.done', 'uses' => 'Admin\ContactController@done']);
    Route::post('contact/mail/{contact}', ['as' => 'admin.contact.mail', 'uses' => 'Admin\ContactController@mail']);
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

Route::get('contact2', function()
{
    return View::make('front.contact.contact2');
});

//Route pour le panier
// Route::resource('basket', 'Front\BasketController', ['only' => ['destroy', 'index']]);
Route::get('basket/{basket}', ['as' => 'basket.destroy', 'uses' => 'Front\BasketController@destroy']);
Route::get('basket', ['as' => 'basket.index', 'uses' => 'Front\BasketController@index']);
Route::post('basket', ['as' => 'basket.post', 'uses' => 'Front\BasketController@post']);

//Route pour la commande
Route::get('purchase/address', ['as' => 'purchase.address', 'uses' => 'Front\PurchaseController@address']);
Route::get('purchase/livraison', ['as' => 'purchase.livraison', 'uses' => 'Front\PurchaseController@livraison']);
Route::post('purchase/livraison', ['as' => 'purchase.livraison.post', 'uses' => 'Front\PurchaseController@livraisonPost']);
Route::get('purchase/payment', ['as' => 'purchase.payment', 'uses' => 'Front\PurchaseController@payment']);
Route::post('purchase/confirm', ['as' => 'purchase.confirm', 'uses' => 'Front\PurchaseController@confirm']);
Route::get('purchase/cancel', ['as' => 'purchase.cancel', 'uses' => 'Front\PurchaseController@cancel']);
Route::get('purchase/return', ['as' => 'purchase.return', 'uses' => 'Front\PurchaseController@retour']);

Route::get('/', ['as' => 'home', function()
{
     return View::make('front.home.home');
}]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
