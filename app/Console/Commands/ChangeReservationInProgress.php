<?php

namespace App\Console\Commands;

use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ChangeReservationInProgress extends Command
{

    protected $signature = 'app:change-reservation-in-progress';

    protected $description = 'Cambia el estado de la reserva que se esta desarrollando en ese instante.';

    public function handle()
    {
        $now = Carbon::now();

        $reservationsStartedNow = Reserva::where('fecha', $now->toDateString())
            ->where('hora', '<=', $now->format('H:i:s'))
            ->whereIn('estado', ['APROBADO', 'REPROGRAMADO'])
            ->get();

        if ($reservationsStartedNow->isEmpty()) {
            $this->info('No hay reservas que actualizar en este momento.');
            return;
        }

        foreach ($reservationsStartedNow as $reserva) {
            $reserva->estado = 'EN CURSO';
            $reserva->save();

            $mesa = $reserva->mesa;
            $mesa->estado = 'OCUPADO';
            $mesa->save();
            
            $this->info("Mesa ID {$mesa->id} actualizada a OCUPADO.");
            $this->info("Reserva ID {$reserva->id} actualizada a EN CURSO.");
        }

        $this->info('Estados actualizados correctamente.');
    }
}
