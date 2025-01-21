<?php

namespace App\Http\Requests\empleado;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpleadoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:50',
            'apellido_paterno' => 'required|string|max:50',
            'apellido_materno' => 'required|string|max:50',
            'celular' => 'required|string|digits:9|unique:empleados,celular',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
