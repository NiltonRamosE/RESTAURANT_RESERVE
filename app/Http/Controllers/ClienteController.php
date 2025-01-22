<?php

namespace App\Http\Controllers;

use App\Http\Requests\register\UpdateRegisterRequest;
use App\Models\Cliente;
use App\Models\Reserva;

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

    public function reservationsActivesOfClient(Cliente $cliente)
    {
        $reservationsActive = Reserva::where('cliente_id', $cliente->id)
                                        ->whereIn('estado', ['APROBADO', 'REPROGRAMADO'])
                                        ->paginate(10);
        return view('sections.client.reservationsActive', compact('reservationsActive'));
    }

    public function reservationsHistoryOfClient(Cliente $cliente)
    {
        $reservationsHistory = Reserva::where('cliente_id', $cliente->id) 
                                        ->whereNotIn('estado', ['APROBADO', 'REPROGRAMADO'])
                                        ->paginate(10);
        return view('sections.client.reservationHistory', compact('reservationsHistory'));
    }
}
