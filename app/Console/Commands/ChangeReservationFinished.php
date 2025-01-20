<?php

namespace App\Console\Commands;

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
            $hourFinishedReservation = Carbon::parse($reserva->hora)->addHours($this->calculateDuration($reserva->duracion));

            if ($now->greaterThanOrEqualTo($hourFinishedReservation)) {
                $reserva->estado = 'EFECTUADO';
                $reserva->save();

                $this->info("Reserva ID {$reserva->id} actualizada a EFECTUADO.");
            }
        }

        $this->info("Proceso completado.");
    }

    private function calculateDuration(string $tipo): int
    {
        return match ($tipo) {
            'RAPIDO' => 1,
            'PROMEDIO' => 2,
            'EXTENDIDO' => 3,
            default => 0,
        };
    }
}
