<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;

class UserDeactivated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if($user = Auth::user())
        {
            if($user->active)
                return $next($request);
            else
            {
                return redirect('/deactivated');
            }
        }
        return $next($request);
    }
}
