<?php

namespace App\Rules;

use App\Models\Reserva;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ReservationOverlapRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $dateReservationRequest = request('fecha');
        $tableIdReservationRequest = request('mesa_id');
        $durationReservationRequest = (new Reserva())->calculateDuration(request('duracion'));

        $allReservationsByDateAndTable = Reserva::where('fecha', $dateReservationRequest)
            ->where('mesa_id', $tableIdReservationRequest)
            ->whereIn('estado', ['APROBADO', 'REPROGRAMADO'])
            ->get(['hora', 'duracion']);

        $startHourReservationRequest = Carbon::createFromFormat('H:i:s', $value . ':00');
        $endHourReservationRequest = $startHourReservationRequest->copy()->addHours($durationReservationRequest);

        foreach ($allReservationsByDateAndTable as $reservation) {
            $startHourReservationDB = Carbon::createFromFormat('H:i:s', $reservation->hora);
            $endHourReservationDB = $startHourReservationDB->copy()->addHours($reservation->calculateDuration($reservation->duracion));

            if ($startHourReservationRequest->lt($endHourReservationDB) && $endHourReservationRequest->gt($startHourReservationDB)) {
                $fail("La reserva se traslapa con una existente para esta mesa.");
                return;
            }
        }
    }
}
