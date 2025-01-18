<?php

namespace App\Http\Controllers;

use App\Http\Requests\reserva\StoreReservaRequest;
use App\Models\Mesa;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{

    public function index()
    {
        $mesas = Mesa::all();

        return view('pages/reservas', compact('mesas'));
    }

    public function create()
    {
        //
    }

    public function store(StoreReservaRequest $request)
    {
        $validated = $request->validated();

        $userInSession = session('userIsAuthenticated');
        if (!$userInSession || !isset($userInSession['user']['id'])) {
            return redirect()->back()->withErrors(['error' => 'El usuario no tiene un cliente asociado.']);
        }

        $validated['cliente_id'] = $userInSession['user']['id'];

        $reservaCreated = Reserva::create($validated);

        $mesaFound = Mesa::find($validated['mesa_id']);

        $mesaFound->update([
            'estado' => 'OCUPADO',
        ]);

        if (isset($reservaCreated)) {
            return to_route('reserva.index')->with('status', 'Reserva completada correctamente');
        }

        return to_route('reserva.index')->withErrors('error', 'La reserva no se ha podido crear correctamente');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(StoreReservaRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
