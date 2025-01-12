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
            [100, 4, 35.99, 1],
            [101, 4, 35.99, 1],
            [102, 4, 35.99, 1],
            [103, 4, 35.99, 1],
            [104, 4, 20.5, 1],
            [105, 4, 20.5, 1],
            [106, 4, 20.5, 1],
            [107, 4, 20.5, 1],
            [108, 4, 20.5, 1],
            [109, 4, 20.5, 1],
            [110, 6, 45.99, 2],
            [111, 6, 45.99, 2],
            [112, 6, 45.99, 2],
            [113, 6, 45.99, 2],
            [114, 6, 45.99, 2],
            [115, 6, 45.99, 2],
            [116, 2, 10.00, 2],
            [117, 2, 10.00, 2],
            [118, 2, 10.00, 2],
            [119, 2, 10.00, 2],
            [120, 2, 10.00, 2],
            [121, 2, 10.00, 2],
            [122, 2, 10.00, 2],
            [123, 2, 10.00, 2],
            [124, 2, 10.00, 2],
            [125, 2, 10.00, 2],
            [126, 2, 10.00, 2],
            [127, 2, 10.00, 2],
        ];

        foreach ($mesas as $mesaData) {
            $mesa = new Mesa();
            $mesa->numero = $mesaData[0];
            $mesa->cantidad_asientos = $mesaData[1];
            $mesa->precio = $mesaData[2];
            $mesa->piso = $mesaData[3];
            $mesa->save();
        }
    }
}
