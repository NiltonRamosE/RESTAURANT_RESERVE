<?php

namespace App\Http\Requests\reserva;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fecha' => 'required|date',
            'hora' => 'required',
            'duracion' => 'required|in:RAPIDO,PROMEDIO,EXTENDIDO',
            'mesa_id' => 'required|exists:mesas,id',
            'estado' => 'required|in:APROBADO,CANCELADO,REPROGRAMADO,EN CURSO,EFECTUADO',
        ];
    }
}
