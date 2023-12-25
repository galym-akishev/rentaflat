<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPanelMiddleware
{
    final const ROLE_ADMIN = 'admin';

    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(is_null(auth()->user()))
        {
            return redirect()->route('home');
        }
        if (auth()->user()->role !== self::ROLE_ADMIN)
        {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
