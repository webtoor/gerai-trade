<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class MemberMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = $request->user()->role;

        if ($user) {
            if (($user->role_id == '1') || ($user->role_id == '2')) {
                return $next($request);
            }
        }
        
        return abort(403);
    }
}
