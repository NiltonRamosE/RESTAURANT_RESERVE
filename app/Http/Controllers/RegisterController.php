<?php

namespace App\Http\Controllers;

use App\Http\Requests\register\StoreRequest;
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

        $user =  Usuario::create([
            'correo' => $request->get('correo'),
            'password' => $request->get('password')
        ]);

        $cliente = Cliente::create([
            'nombre' => $validated['nombre'],
            'apellido_paterno' => $validated['apellido_paterno'],
            'apellido_materno' => $validated['apellido_materno'],
            'celular' => $validated['celular'],
            'usuario_id' => $user->id,
        ]);

        if (isset($cliente)) {
            return to_route('login.index')->with('status', 'Registro completado correctamente');
        }

        return to_route('register.create');
    }
}
