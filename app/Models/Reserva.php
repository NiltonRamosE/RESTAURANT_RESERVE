<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'fecha',
        'hora',
        'estado',
        'cliente_id',
        'mesa_id',
    ];

    protected $hidden = [
        'cliente_id',
        'mesa_id',
    ];
}
