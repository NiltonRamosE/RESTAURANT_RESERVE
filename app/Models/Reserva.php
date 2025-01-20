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

    public function calculateDuration(string $duracion): int
    {
        return match ($duracion) {
            'RAPIDO' => 1,
            'PROMEDIO' => 2,
            'EXTENDIDO' => 3,
            default => 0,
        };
    }
}
