<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mesa;

class MesaSeeder extends Seeder
{

    public function run(): void
    {
        $mesas = [
            [100, 4, 35.99, 'LIBRE'],
            [101, 4, 35.99, 'LIBRE'],
            [102, 4, 35.99, 'LIBRE'],
            [103, 4, 35.99, 'LIBRE'],
            [104, 4, 20.5, 'LIBRE'],
            [105, 4, 20.5, 'LIBRE'],
            [106, 4, 20.5, 'LIBRE'],
            [107, 4, 20.5, 'LIBRE'],
            [108, 4, 20.5, 'LIBRE'],
            [109, 4, 20.5, 'LIBRE'],
            [110, 6, 45.99, 'LIBRE'],
            [111, 6, 45.99, 'LIBRE'],
            [112, 6, 45.99, 'LIBRE'],
            [113, 6, 45.99, 'LIBRE'],
            [114, 6, 45.99, 'LIBRE'],
            [115, 6, 45.99, 'LIBRE'],
            [116, 2, 10.00, 'LIBRE'],
            [117, 2, 10.00, 'LIBRE'],
            [118, 2, 10.00, 'LIBRE'],
            [119, 2, 10.00, 'LIBRE'],
            [120, 2, 10.00, 'LIBRE'],
            [121, 2, 10.00, 'LIBRE'],
            [122, 2, 10.00, 'LIBRE'],
            [123, 2, 10.00, 'LIBRE'],
            [124, 2, 10.00, 'LIBRE'],
            [125, 2, 10.00, 'LIBRE'],
            [126, 2, 10.00, 'LIBRE'],
            [127, 2, 10.00, 'LIBRE'],
        ];

        foreach ($mesas as $mesaData) {
            $mesa = new Mesa();
            $mesa->numero = $mesaData[0];
            $mesa->cantidad_asientos = $mesaData[1];
            $mesa->precio = $mesaData[2];
            $mesa->estado = $mesaData[3];
            $mesa->save();
        }
    }
}
