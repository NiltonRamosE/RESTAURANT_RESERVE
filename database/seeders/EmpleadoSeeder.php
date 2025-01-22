<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{

    public function run(): void
    {
        $empleados = [
            ['NILTON', 'RAMOS', 'ENCARNACION', '123456789', 1]
        ];

        foreach ($empleados as $empleadoData) {
            $empleado = new Empleado();
            $empleado->nombre = $empleadoData[0];
            $empleado->apellido_paterno = $empleadoData[1];
            $empleado->apellido_materno = $empleadoData[2];
            $empleado->celular = $empleadoData[3];
            $empleado->usuario_id = $empleadoData[4];
            $empleado->save();
        }
    }
}
