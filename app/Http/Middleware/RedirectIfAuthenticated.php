<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            /* return redirect('/home'); */
            if((Auth::user()->role->role_id == '1') || (Auth::user()->role->role_id == '2')){
                return redirect('home');
            }elseif(Auth::user()->role->role_id == '3'){
                return redirect('admin-panel');
            }
        }

        return $next($request);
    }
}
