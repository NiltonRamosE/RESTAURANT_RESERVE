<?php

namespace App\Http\Requests\mesa;

use Illuminate\Foundation\Http\FormRequest;

class StoreMesaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'numero' => 'required|integer|min:100|unique:mesas,numero',
            'cantidad_asientos' => 'required|integer|min:2|max:10',
            'precio' => 'required|numeric|min:0|max:9999.99',
            'piso' => 'required|integer|min:1|max:2',
        ];
    }
}
