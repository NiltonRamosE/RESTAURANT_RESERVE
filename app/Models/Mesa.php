<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $fillable = [
        'numero',
        'cantidad_asientos',
        'precio',
        'estado',
        'piso',
    ];
}
