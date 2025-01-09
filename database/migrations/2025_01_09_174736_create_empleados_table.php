<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usuario_id');
            $table->string('nombre', length: 50);
            $table->string('apellido_paterno', length: 50);
            $table->string('apellido_materno', length: 50);
            $table->string('celular', length: 9);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
