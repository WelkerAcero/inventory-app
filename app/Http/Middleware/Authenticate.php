<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return redirect()->route('login');
            /* return route('login.login'); */
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        if (!empty(session('authenticated'))) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
