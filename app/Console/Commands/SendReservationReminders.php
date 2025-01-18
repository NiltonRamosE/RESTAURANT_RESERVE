<?php

namespace App\Console\Commands;

use App\Jobs\SendReservationReminder;
use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendReservationReminders extends Command
{

    protected $signature = 'app:send-reservation-reminders';

    protected $description = 'Envía recordatorios de reservas programadas';

    public function handle()
    {
        $now = Carbon::now('America/Lima');

        $nowDatePlusDay = $now->copy()->addDay()->toDateString();
        $nowHourPlusHour = $now->copy()->addHour()->format('H:i:s');
        $nowDate = $now->toDateString();

        $reservationsNeedReminder = Reserva::whereIn('estado', ['APROBADO', 'REPROGRAMADO'])
            ->where(function ($query) use ($nowDate, $nowDatePlusDay, $nowHourPlusHour) {
                $query->whereDate('fecha', '=', $nowDatePlusDay)
                    ->whereTime('hora', '=', $nowHourPlusHour)
                    ->orWhere(function ($subQuery) use ($nowDate, $nowHourPlusHour) {
                        $subQuery->whereDate('fecha', '=', $nowDate)
                                ->whereTime('hora', '=', $nowHourPlusHour);
                    });
            })
            ->with(['cliente.usuario', 'mesa'])
            ->get();

        foreach ($reservationsNeedReminder as $reservation) {

            $userReservation = $reservation->cliente->usuario;

            $clientReservation = $reservation->cliente;

            $mesaReservation = $reservation->mesa;

            $full_name_client =  $clientReservation->nombre .' '. $clientReservation->apellido_paterno .' '. $clientReservation->apellido_materno;

            $reserveInformation = [
                'cliente' => $full_name_client,
                'fecha' => $reservation->fecha,
                'hora' => $reservation->hora,
                'numero_mesa' => $mesaReservation->numero,
            ];

            SendReservationReminder::dispatch($userReservation->correo, $reserveInformation);
        }

        $this->info('Recordatorios enviados correctamente.');
    }
}
