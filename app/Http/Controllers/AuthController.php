<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\AuthRequest;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{

    public function index()
    {
        return view('pages.login');
    }

    public function login(AuthRequest $request)
    {
        $validated = $request->validated();

        $correo = $validated['correo'];
        $password = $validated['password'];
        
        $verifyAttempForUser = $correo . '|' . $request->ip();
        if (RateLimiter::tooManyAttempts($verifyAttempForUser, 3)) {
            return back()->withErrors(['error' => 'Demasiados intentos. Inténtalo más tarde.']);
        }
        RateLimiter::hit($verifyAttempForUser);

        if (auth('usuarios')->attempt(['correo' => $correo, 'password' => $password])) {

            RateLimiter::clear($correo);

            $userAuthenticated = auth('usuarios')->user();

            $clientAuthenticated = $userAuthenticated->cliente;
            $employeeAuthenticated = $userAuthenticated->empleado;

            $userInSession = [
                'correo' => $userAuthenticated->correo,
                'user' => $clientAuthenticated ?? $employeeAuthenticated
            ];

            session(['userIsAuthenticated' => $userInSession]);

            if (isset($clientAuthenticated)) {
                return to_route('reserva.index');
            } elseif(isset($employeeAuthenticated)){
                return to_route('pages.index');
            }
        }
        return back()->withErrors(['error' => 'Credenciales incorrectas.']);
    }

    public function logout()
    {
        auth('usuarios')->logout();

        session()->forget('userIsAuthenticated');

        return to_route('auth.index');
    }

}
