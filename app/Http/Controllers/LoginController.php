<?php

namespace App\Http\Controllers;

use App\Http\Requests\login\LoginRequest;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{

    public function index()
    {
        return view('pages/login');
    }


    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        $correo = $validated['correo'];
        $password = $validated['password'];
        
        if (RateLimiter::tooManyAttempts($correo, 3)) {
            return back()->withErrors(['error' => 'Demasiados intentos. Inténtalo más tarde.']);
        }

        RateLimiter::hit($correo);

        if (auth('usuarios')->attempt(['correo' => $correo, 'password' => $password])) {

            RateLimiter::clear($correo);

            $userAuth = auth('usuarios')->user();

            $client = $userAuth->cliente;
            $employee = $userAuth->empleado;

            $userSession = [
                'correo' => $userAuth->correo,
                'user' => $client ?? $employee
            ];

            session(['userSession' => $userSession]);

            if (isset($client)) {
                return to_route('pages.reservas');
            } elseif(isset($employee)){
                return to_route('pages.index');
            }
        }
        return back()->withErrors(['error' => 'Credenciales incorrectas.']);
    }

    public function logout()
    {
        auth('usuarios')->logout();

        session()->forget('userSession');

        return to_route('auth.index');
    }

}
