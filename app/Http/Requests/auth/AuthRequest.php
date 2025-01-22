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
            'correo' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@(sietesopas\.org|gmail\.com)$/',
            ],
            'password' => 'required|string|min:8',
        ];
    }
}
