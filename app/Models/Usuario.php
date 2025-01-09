<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'correo',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
