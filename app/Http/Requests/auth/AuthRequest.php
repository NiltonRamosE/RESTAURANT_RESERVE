<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'correo' => 'required',
            'password' => 'required',
        ];
    }
}
