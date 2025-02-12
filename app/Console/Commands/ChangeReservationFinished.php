<?php

namespace App\Console\Commands;

use App\Models\Mesa;
use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ChangeReservationFinished extends Command
{

    protected $signature = 'app:change-reservation-finished';

    protected $description = 'Actualizar reservas EN CURSO a EFECTUADO basándose en su duración';

    public function handle()
    {
        $now = Carbon::now();

        $reservationInProgress = Reserva::where('estado', 'EN CURSO')->get();

        foreach ($reservationInProgress as $reserva) {
            $hourFinishedReservation = Carbon::parse($reserva->hora)->addHours($reserva->calculateDuration($reserva->duracion));

            if ($now->greaterThanOrEqualTo($hourFinishedReservation)) {
                $reserva->estado = 'EFECTUADO';
                $reserva->save();

                $mesa = $reserva->mesa;
                $mesa->estado = 'LIBRE';
                $mesa->save();

                $this->info("Mesa ID {$mesa->id} actualizada a LIBRE.");
                $this->info("Reserva ID {$reserva->id} actualizada a EFECTUADO.");
            }
        }

        $this->info("Proceso completado.");
    }
}
