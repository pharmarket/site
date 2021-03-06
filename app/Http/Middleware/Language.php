<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\Routing\Middleware;

class Language implements Middleware {

    public function __construct(Application $app, Redirector $redirector, Request $request) {
        $this->app = $app;
        $this->redirector = $redirector;
        $this->request = $request;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $map = [
            'en' => 'en_GB',
            'fr' => 'fr_FR.utf8',
            'es' => 'es_ES',
            'de' =>'de_DE.utf8',
        ];
        if(!session()->has('locale')){
            session()->put('locale', strtolower(substr(\Request::server('HTTP_ACCEPT_LANGUAGE'), 0, 2)));
        }

        $this->app->setLocale(session('locale'));
        setlocale(LC_ALL, $map[session('locale')]);
        return $next($request);
    }

}
