<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\AuthRequest;
use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Support\Facades\RateLimiter;
use Laravel\Socialite\Facades\Socialite;

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
                return to_route('dashboard.index');
            }
        }
        return back()->withErrors(['error' => 'Credenciales incorrectas.']);
    }

    public function loginRedirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        $user_google = Socialite::driver('google')->user();
        $fullName = $user_google->name;
        $nameParts = explode(' ', $fullName);

        $apellido_materno = array_pop($nameParts);
        $apellido_paterno = array_pop($nameParts);

        $nombre = implode(' ', $nameParts);

        $user = Usuario::where('google_id', $user_google->id)->first();

        $user = Usuario::updateOrCreate(
            [
                'google_id' => $user_google->id
            ],
            [
                'correo' => $user_google->email
            ]
        );

        $client = $user->cliente()->first();
    
        if (!$client) {
            $client = Cliente::create([
                'usuario_id' => $user->id,
                'nombre' => $nombre,
                'apellido_paterno' => $apellido_paterno,
                'apellido_materno' => $apellido_materno
            ]);
        }

        auth('usuarios')->login($user);

        $userAuthenticated = auth('usuarios')->user();

        $clientAuthenticated = $userAuthenticated->cliente;

        $userInSession = [
            'correo' => $userAuthenticated->correo,
            'user' => $clientAuthenticated
        ];

        session(['userIsAuthenticated' => $userInSession]);

        return to_route('reserva.index');
    }

    public function logout()
    {
        auth('usuarios')->logout();

        session()->forget('userIsAuthenticated');

        return to_route('auth.index');
    }

}
