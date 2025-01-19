<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'fecha',
        'hora',
        'estado',
        'duracion',
        'cliente_id',
        'mesa_id',
    ];

    protected $hidden = [
        'cliente_id',
        'mesa_id',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }
}
