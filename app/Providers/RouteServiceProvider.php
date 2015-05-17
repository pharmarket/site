<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;


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
			\App::abort(404);
		});
		$router->model('contact', 'App\Contact', function() {
			\App::abort(404);
		});

		$router->model('newsletter_mail', 'App\Newsletter_mail', function() {
			\App::abord(404);
		});



        $router->model('cgu', 'App\Cgu', function() {
            \App::abort(404);
        });

        $router->model('cgv', 'App\Cgv', function() {
            \App::abort(404);
        });


        $router->model('faq', 'App\Faq', function() {
            \App::abord(404);
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
