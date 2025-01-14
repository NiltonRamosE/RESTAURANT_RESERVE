<?php

namespace App\Http\Controllers;

use App\Http\Requests\register\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Cliente;

class RegisterController extends Controller
{
    public function create()
    {
        return view('pages/register');
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        if (isset($validated)) {
            
            $user =  Usuario::create([
                'correo' => $request->get('correo'),
                'password' => $request->get('password')
            ]);

            Cliente::create([
                'nombre' => $request->get('nombre'),
                'apellido_paterno' => $request->get('apellido_paterno'),
                'apellido_materno' => $request->get('apellido_materno'),
                'celular' => $request->get('celular'),
                'usuario_id' => $user->id,
            ]);
            return to_route('pages.login');
        }
        return to_route('register.create');
    }
}
