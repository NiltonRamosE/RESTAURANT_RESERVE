<?php

namespace App\Http\Requests\register;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|max:50',
            'apellido_paterno' => 'required|max:50',
            'apellido_materno' => 'required|max:50',
            'celular' => 'required|max:9|min:9|unique:clientes,celular,'. $this->route('cliente')->id,
        ];
    }
}
