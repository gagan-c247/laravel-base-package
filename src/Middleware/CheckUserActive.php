<?php

namespace C247\Codebank\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->status == "1") {
            return $next($request);
        } else {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', __('validation_messages.login.account.deactivated'));
        }
    }
}
