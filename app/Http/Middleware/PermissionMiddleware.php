<?php

namespace App\Http\Middleware;

use App\Role;
use App\User;
use Auth;
use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$permissions)
	{
		if (Auth::guest()) {
			return redirect('/');
		}

		foreach ($permissions as $permission)
		{
			if (! $request->user()->can($permission)) {
			   abort(403);
			}
		}
		return $next($request);
	}
}
