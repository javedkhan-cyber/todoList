<?php

namespace App\Http\Middleware;

use Closure;
USE Auth;

class CheckStatus
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
        if (Auth()->check() && Auth::user()->email != 'admin@email.com') 
             return redirect()->route('login');
        return $next($request);
    }
    

}