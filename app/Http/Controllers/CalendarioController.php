<?php

namespace App\Http\Controllers;

use App\Models\Reserva;

class CalendarioController extends Controller
{

    public function index($fecha = null)
    {
        $fecha = $fecha ?? now()->toDateString();

        $reservations = Reserva::where('fecha', 'like', $fecha . '%')
            ->with('cliente', 'mesa') 
            ->get();

        return view('pages.calendario', compact('reservations', 'fecha'));
    }
}
