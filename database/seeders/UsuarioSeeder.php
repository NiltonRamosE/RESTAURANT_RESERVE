<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{

    public function run(): void
    {
        $users = [['nramose@sietesopas.org', '12345678']];

        foreach ($users as $userData) {
            $user = new Usuario();
            $user->correo = $userData[0];
            $user->password = $userData[1];
            $user->save();
        }
    }
}
