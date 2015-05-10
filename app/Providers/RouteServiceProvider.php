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
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router, Request $request)
	{
		$langue = ['fr', 'en', 'de', 'es', ''];
		$locale = $request->segment(1);
		$this->app->setLocale($locale);

		//Si le prefix est une langue, on localise la langue sur le front
		if(in_array($locale, $langue)){
			$router->group(['namespace' => $this->namespace,'prefix' => $locale ], function($router){
				require app_path('Http/routes.php');
			});
		}else{
			$router->group(['namespace' => $this->namespace], function($router){
				require app_path('Http/routes.php');
			});
		}
	}
}
