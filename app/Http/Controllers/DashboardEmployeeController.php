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

        $reservasPorMes = Reserva::selectRaw('MONTH(fecha) as mes, COUNT(*) as total')
            ->whereYear('fecha', Carbon::now()->year)
            ->groupBy('mes')
            ->pluck('total', 'mes')
            ->toArray();

        $ocupacionMesas = Reserva::selectRaw('estado, COUNT(*) as total')
            ->groupBy('estado')
            ->pluck('total', 'estado')
            ->toArray();

        $meses = collect(range(1, 12))->map(function ($mes) {
            return Carbon::create()->month($mes)->locale('es')->translatedFormat('F');
        })->toArray();

        $dataCards = [
            'lastestUpdateDate' => $lastestUpdateDate,
            'numberOfEmployees' => $numberOfEmployees,
            'reservationsActives' => $reservationsActives,
            'numberOfClients' => $numberOfClients,
        ];

        $chartData = [
            'reservasPorMes' => $reservasPorMes,
            'ocupacionMesas' => $ocupacionMesas,
            'meses' => $meses,
        ];
    
        return view('pages.employee.dashboard-management', compact('dataCards', 'chartData'));
    }
}
