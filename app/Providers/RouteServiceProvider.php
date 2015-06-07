<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;

use 	\App as App;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

		$router->model('user', 'App\User', function() {
			App::abort(404);
		});

		$router->model('catForum', 'App\Forum_categories', function() {
			App::abort(404);
		});

		$router->model('thread', 'App\Forum_thread', function() {
			App::abort(404);
		});

		$router->model('role', 'App\Role', function() {
			\App::abort(404);
		});


		$router->model('contact', 'App\Contact', function() {
			App::abort(404);
		});

		$router->model('posologie', 'App\Posologie', function() {
			App::abord(404);
		});

		$router->model('posologie_sexe', 'App\Posologie_sexe', function() {
			App::abord(404);
		});

		$router->model('newsletter_mail', 'App\Newsletter_mail', function() {
			App::abort(404);
		});

		$router->model('newsletter', 'App\Newsletter', function() {
			App::abort(404);
		});

		$router->model('produit', 'App\Produit', function() {
			App::abort(404);
		});

		$router->model('cgu', 'App\Cgu', function() {
		    	App::abort(404);
		});

        $router->model('cgv', 'App\Cgv', function() {
            App::abort(404);
        });


        $router->model('faq', 'App\Faq', function() {
            App::abort(404);
        });


        $router->model('produit', 'App\Produit', function() {
            App::abort(404);
        });
        $router->model('categorie', 'App\Produit_categorie', function() {
            App::abort(404);
        });
        $router->model('sous_categorie', 'App\Sous_categorie', function() {
            App::abort(404);
        });
				$router->model('commentaire', 'App\Commentaire', function() {
            App::abort(404);
        });
				$router->model('forum_category', 'App\forum_category', function() {
						App::abort(404);
				});


        $router->model('vente', 'App\Vente', function() {
            \App::abort(404);
        });





        $router->model('commande', 'App\Commande', function() {
            \App::abort(404);
        });

        $router->model('commandeExemplaire', 'App\Commande_exemplaire', function() {
            \App::abort(404);
        });

        $router->model('commandeLivraison', 'App\Commande_livraison', function() {
            \App::abort(404);
        });

        $router->model('commandePaiement', 'App\Commande_paiement', function() {
            \App::abort(404);
        });





        $router->model('fournisseur', 'App\Fournisseur', function() {
            \App::abort(404);
        });


        $router->model('whoPharmarket', 'App\WhoPharmarket', function() {
            \App::abort(404);
        });


        $router->model('charte', 'App\CharteQ', function() {
            \App::abort(404);
        });

	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router, Request $request)
	{
		$router->group(['namespace' => $this->namespace], function($router){
			require app_path('Http/routes.php');
		});
	}
}
