<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MesaController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
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
