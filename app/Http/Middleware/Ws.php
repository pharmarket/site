<?php namespace App\Http\Middleware;

use Closure;

class Ws {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($request->header('key') != \Config::get('webservice.key')){
	            	return \Response::json([
			        'error' => 'Access denied!',
			    ], 403);
	        	}

		return $next($request);
	}

}
