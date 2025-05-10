<?php

namespace C247\Codebank\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has an admin role
        if (Auth::check()) {
            return $next($request);
        }

        // Redirect to login if not authenticated or not an admin
        return redirect()->route('admin.login');
    }
}
