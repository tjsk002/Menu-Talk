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
            return redirect('/home');

        }
        // guest() <-> check()
        if($request::guard($guard)->guest()){
            // Auth::guard($guard)->guest() 와 같다고 봐도 된다
            if($request->ajax() || $request->wantsJson()){
                return response('Unauthourized, 401');
            }else{
                return redirect()-> guest('/login');
//                return redirect()-> guest('admin/login');
            }
        }

        return $next($request);
    }
}
