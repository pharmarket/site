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

Route::group(['prefix' => 'admin'], function()
{
	/*** je te met une liste exaustives des pages **/

    Route::get('/', [ 'as' => 'accueil', 'uses' => 'Admin@index']);

    Route::get('dashbord', function()
    {
        return 'admin';
    });

    Route::get('catalogue', function()
    {
        return 'catalogue';
    });

    Route::get('produit', function()
    {
        return 'produit';
    });
    Route::get('commandes', function()
    {
        return 'comande';
    });

    Route::get('customers', function()
    {
        return 'customers';
    });

    Route::get('stats', function()
    {
        return 'stats';
    });
    Route::get('dashbord', function()
    {
        return 'admin';
    });

    /**** Liste des demandes de contact triés de 3 façon ***/
    /* - en Attente de traitement -*/
    /* - en Cours de traitement -*/
    /* - Traitement terminer-*/

    Route::get('contact', function()
    {
        return 'contact';
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

//*** en creation ne pas faire gaffe je test les template voir si sa peu être interessant**/
//Route::get('/', 'WelcomeController@index');

//Route::get('/', 'HomeController@index');



/*** la page contact est appeler comme ceci et c'est tout rien d'autre a faire **/

Route::get('contact', function()
{
    return View::make('front.contact.contact');
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

Route::get('commande', function()
{
    return View::make('front.commande.adresse');
});



Route::get('contact2', function()
{
    return View::make('front.contact.contact2');
});

Route::get('/', function()
{
     return View::make('front.home.home');
});
/***dimitry je vais avoir besoin de toi a se niveau je ne sais pas comment gérer l'auth entre un truck php et un truck js on stock la session en php ici aussi ???*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
