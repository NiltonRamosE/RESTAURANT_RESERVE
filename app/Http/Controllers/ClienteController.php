<?php

namespace App\Http\Controllers;

use App\Http\Requests\register\UpdateRegisterRequest;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function show(Cliente $cliente)
    {
        return view('pages.client.perfil-client', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('sections.client.updateClient', compact('cliente'));
    }

    public function update(UpdateRegisterRequest $request, Cliente $cliente)
    {
        $validated = $request->validated();

        $cliente->update([
            'nombre' => strtoupper($validated['nombre']),
            'apellido_paterno' => strtoupper($validated['apellido_paterno']),
            'apellido_materno' => strtoupper($validated['apellido_materno']),
            'celular' => $validated['celular'],
        ]);

        return to_route('cliente.show', $cliente)->with('status', 'Empleado actualizado correctamente');
    }
}
