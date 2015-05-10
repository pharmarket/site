<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
	        	$roles = $this->getRoles($request)[0];
		if ($this->auth->guest()){
			if ($request->ajax()){
				return response('Unauthorized.', 401);
			}
			else{
				return \Redirect::guest(\Route('user.login'));
			}
		}elseif(\Auth::check()){
			//Si, l'utilisateur n' pas bon le role on le redirige
			if(\Auth::user()->role->label != $roles){
				//Si c'est un client, on le redirge vers la home
				if(\Auth::user()->role->label == 'customer'){
					return \Redirect::route('home');
				}
				//Si c'est un client, on le redirge vers l'admin
				elseif(\Auth::user()->role->label == 'admin'){
					return \Redirect::route('accueil');
				}
			}
		}

		return $next($request);
	}

	public function getRoles($request){
	        $actions = $request->route()->getAction();

	        return $actions['roles'];
	}
}
