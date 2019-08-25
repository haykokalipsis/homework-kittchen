<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class UserMiddleware
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
        if (Auth::guest())
            return redirect()->route('login');

        if (Auth::user()->role != 'user')
            return redirect()->route('admin');

        return $next($request);
    }
}
