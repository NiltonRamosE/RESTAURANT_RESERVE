<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UsuarioSeeder;
use Database\Seeders\EmpleadoSeeder;
use Database\Seeders\MesaSeeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        $this->call([
            UsuarioSeeder::class,
            EmpleadoSeeder::class,
            MesaSeeder::class,
        ]);
    }
}
