<?php

namespace App\Http\Controllers;

use App\Http\Requests\mesa\StoreMesaRequest;
use App\Http\Requests\mesa\UpdateMesaRequest;
use App\Models\Mesa;
use App\Models\Reserva;
use Carbon\Carbon;

class MesaController extends Controller
{

    public function index()
    {
        $mesas = Mesa::paginate(10);

        return view('pages.employee.dashboard-mesas', compact('mesas'));
    }

    public function create()
    {
        return view('sections.mesa.addMesa');
    }

    public function store(StoreMesaRequest $request)
    {
        $validated = $request->validated();

        Mesa::create([
            'numero' => $validated['numero'],
            'cantidad_asientos' => $validated['cantidad_asientos'],
            'precio' => $validated['precio'],
            'piso' => $validated['piso'],
        ]);

        return to_route('mesas-management.index')->with('status', 'Mesa añadida correctamente');
    }

    public function show(Mesa $mesas_management)
    {
        return view('sections.mesa.showMesa', compact('mesas_management'));
    }

    public function edit(Mesa $mesas_management)
    {
        return view('sections.mesa.updateMesa', compact('mesas_management'));
    }

    public function update(UpdateMesaRequest $request, Mesa $mesas_management)
    {
        $validated = $request->validated();

        $mesas_management->update([
            'numero' => $validated['numero'],
            'cantidad_asientos' => $validated['cantidad_asientos'],
            'precio' => $validated['precio'],
            'piso' => $validated['piso'],
            'estado' => $validated['estado'],
        ]);

        return to_route('mesas-management.index')->with('status', 'Mesa actualizada correctamente');
    }

    public function destroy(Mesa $mesas_management)
    {
        $mesas_management->delete();

        return to_route('mesas-management.index')->with('status', 'Mesa eliminada correctamente');
    }

    public function reservasActuales(string $id)
    {
        $dateNow = Carbon::now()->toDateString();

        $reservationsDateNow = Reserva::with('cliente:id,nombre')
            ->where('mesa_id', $id)
            ->where('fecha', $dateNow)
            ->whereNotIn('estado', ['EFECTUADO', 'CANCELADO'])
            ->get(['hora', 'duracion', 'estado', 'cliente_id']);

        foreach ($reservationsDateNow as $reservation) {
            $reservation->duracion_horas = $reservation->calculateDuration($reservation->duracion);
        }
        
        return view('pages.mesa-reservations', compact('reservationsDateNow'));
    }

    public function getPrecio(string $id)
    {
        $mesaFound = Mesa::find($id);

        if ($mesaFound) {
            return response()->json([
                'success' => true,
                'precio' => $mesaFound->precio
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Mesa no encontrada'
        ], 404);
    }
}
