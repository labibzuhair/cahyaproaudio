<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            if (Auth::user()->is_role == 'owner') {
                return $next($request);
            } else {
                Auth::logout();
                return redirect(url('login'));
            }
        } else {
            Auth::logout();
            return redirect(url('login'));

        }
    }
}
