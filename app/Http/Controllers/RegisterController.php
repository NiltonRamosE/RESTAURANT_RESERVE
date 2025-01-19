<?php

namespace App\Http\Controllers;

use App\Http\Requests\register\StoreRequest;
use App\Models\Usuario;
use App\Models\Cliente;

class RegisterController extends Controller
{
    public function create()
    {
        return view('pages.register');
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $userCreated =  Usuario::create([
            'correo' => $request->get('correo'),
            'password' => $request->get('password')
        ]);

        $clienteCreated = Cliente::create([
            'nombre' => $validated['nombre'],
            'apellido_paterno' => $validated['apellido_paterno'],
            'apellido_materno' => $validated['apellido_materno'],
            'celular' => $validated['celular'],
            'usuario_id' => $userCreated->id,
        ]);

        if (isset($clienteCreated)) {
            return to_route('auth.index')->with('status', 'Registro completado correctamente');
        }

        return to_route('register.create');
    }
}
