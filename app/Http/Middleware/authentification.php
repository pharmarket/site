<?php namespace App\Http\Middleware;

use Closure;

class authentification {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($request->header('key') != \Config::get('webservice.key'))
        {
            return redirect('welcome');
        }

		return $next($request);
	}

}
