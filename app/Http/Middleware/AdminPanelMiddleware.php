<?php

namespace App\Http\Middleware;

use App\Enums\UserRolesEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPanelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (is_null(auth()->user())) {
            return redirect()->route('welcome');
        }

        if (auth()->user()->role === UserRolesEnum::USER->value) {
            return redirect()->route('welcome');
        }

        return $next($request);
    }
}
