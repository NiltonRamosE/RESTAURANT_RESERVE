<?php

namespace App\Http\Controllers;

use App\Http\Requests\login\LoginRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
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

        $user = Usuario::where('correo', $correo)->first();

        if ($this->checkPassword($password, $user->password)) {
            RateLimiter::clear($correo);
            return to_route('pages.reservas');
        }
        return back()->withErrors(['error' => 'Credenciales incorrectas.']);
    }

    public function checkPassword($passwordRequest, $passwordDB){
        if(Hash::check($passwordRequest, $passwordDB)){
            return true;
        }
        return false;
    }
}
