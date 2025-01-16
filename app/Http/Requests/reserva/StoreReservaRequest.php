<?php

namespace App\Http\Requests\reserva;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fecha' => 'required',
            'hora' => 'required',
            'mesa_id' => 'required|exists:mesas,id'
        ];
    }
}
