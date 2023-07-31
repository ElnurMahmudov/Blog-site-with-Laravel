<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
  

    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/admin/dashboard');
        }
    
        return $next($request);
    }
    
}
