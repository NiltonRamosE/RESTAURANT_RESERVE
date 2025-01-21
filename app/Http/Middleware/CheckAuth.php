<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{

    public function handle(Request $request, Closure $next): Response
    {
        $userIsAuthenticated = Auth::guard('usuarios')->user();

        if ($userIsAuthenticated) {

            $userIsClient = $userIsAuthenticated->cliente;
            $userIsEmployee = $userIsAuthenticated->empleado;

            if ($userIsClient) {
                return to_route('reserva.index');
            }elseif ($userIsEmployee) {
                return to_route('dashboard.index');
            }
        }

        return $next($request);
    }
}
