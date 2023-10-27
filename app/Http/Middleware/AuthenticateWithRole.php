<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AuthenticateWithRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
     public function handle(Request $request, Closure $next)
     {
         
     
        //  if (Auth::getDefaultDriver() === 'employer') {
        //     if (!Auth::guard('employer')->check()) {
        //         // Debugging statements
        //         echo 'Role: employer, Authenticated: ' . (Auth::guard('employer')->check() ? 'Yes' : 'No');
        //         return redirect()->route('login-employer');
        //     }
        // }
        //  return $next($request);
     }
}
