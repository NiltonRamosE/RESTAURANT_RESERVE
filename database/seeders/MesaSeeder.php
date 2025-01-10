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
            [100, 4, 35.99],
            [101, 4, 35.99],
            [102, 4, 35.99],
            [103, 4, 35.99],
            [104, 4, 20.5],
            [105, 4, 20.5],
            [106, 4, 20.5],
            [107, 4, 20.5],
            [108, 4, 20.5],
            [109, 4, 20.5],
            [110, 6, 45.99],
            [111, 6, 45.99],
            [112, 6, 45.99],
            [113, 6, 45.99],
            [114, 6, 45.99],
            [115, 6, 45.99],
            [116, 2, 10.00],
            [117, 2, 10.00],
            [118, 2, 10.00],
            [119, 2, 10.00],
            [120, 2, 10.00],
            [121, 2, 10.00],
            [122, 2, 10.00],
            [123, 2, 10.00],
            [124, 2, 10.00],
            [125, 2, 10.00],
            [126, 2, 10.00],
            [127, 2, 10.00],
        ];

        foreach ($mesas as $mesaData) {
            $mesa = new Mesa();
            $mesa->numero = $mesaData[0];
            $mesa->cantidad_asientos = $mesaData[1];
            $mesa->precio = $mesaData[2];
            $mesa->save();
        }
    }
}
