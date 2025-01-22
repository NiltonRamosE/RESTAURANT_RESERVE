<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Reserva;
use Carbon\Carbon;

class DashboardEmployeeController extends Controller
{
    public function index()
    {
        $lastestCreatedEmployee = Empleado::latest()->first();

        if ($lastestCreatedEmployee) {
            $createdDate = Carbon::parse($lastestCreatedEmployee->created_at);
            $hoy = Carbon::today();
            $ayer = Carbon::yesterday();
            $anteayer = Carbon::today()->subDays(2);

            if ($createdDate->isSameDay($hoy)) {
                $lastestUpdateDate = 'Hoy';
            } elseif ($createdDate->isSameDay($ayer)) {
                $lastestUpdateDate = 'Ayer';
            } elseif ($createdDate->isSameDay($anteayer)) {
                $lastestUpdateDate = 'Anteayer';
            } else {
                $lastestUpdateDate = $createdDate->format('d/m/Y');
            }

            $numberOfEmployees = Empleado::count();
        }
    
        $reservationsActives = Reserva::whereNotIn('estado', ['EFECTUADO', 'CANCELADO'])->count();

        $numberOfClients = Cliente::count();

        $dataCards = [
            'lastestUpdateDate' => $lastestUpdateDate,
            'numberOfEmployees' => $numberOfEmployees,
            'reservationsActives' => $reservationsActives,
            'numberOfClients' => $numberOfClients,
        ];

        return view('pages.employee.dashboard-management', compact('dataCards'));
    }
}
