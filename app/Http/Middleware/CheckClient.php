<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckClient
{
    public function handle(Request $request, Closure $next): Response
    {
        $userIsAuthenticated = Auth::guard('usuarios')->user();

        if (!$userIsAuthenticated && $request->is('cliente/*')) {
            return to_route('reserva.index');
        }
        
        if ($userIsAuthenticated && $userIsAuthenticated->empleado) {
            return to_route('dashboard.index');
        }

        return $next($request);
    }
}
