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

Route::get('contact',['as' => 'contact'], function()
{
    return View::make('front.contact.contact');
});

Route::get('contact2', function()
{
    return View::make('front.contact.contact2');
});

Route::get('/', function()
{
     return View::make('front.home.home');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
