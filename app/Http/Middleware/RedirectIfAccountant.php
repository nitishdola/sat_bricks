<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAccountant
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'accountant')
	{
	    if (Auth::guard($guard)->check()) {
	        return redirect('accountant/home');
	    }

	    return $next($request);
	}
}