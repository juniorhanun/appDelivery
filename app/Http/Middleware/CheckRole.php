<?php

namespace Delivery\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        if(!Auth::check()):
            return redirect('/login');
        endif;

        if(Auth::user()->role <> $role):
            return redirect('/login');
        endif;

        return $next($request);
    }
}