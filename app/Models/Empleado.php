<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'celular',
        'usuario_id'
    ];

    protected $hidden = [
        'id',
        'usuario_id',
        'created_at',
        'updated_at'
    ];
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
