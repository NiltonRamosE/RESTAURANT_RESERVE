<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckEmployee
{
    public function handle(Request $request, Closure $next): Response
    {
        $userIsAuthenticated = Auth::guard('usuarios')->user();
        
        if (!$userIsAuthenticated || $userIsAuthenticated->cliente) {
            return to_route('reserva.index');
        }

        return $next($request);
    }
}
