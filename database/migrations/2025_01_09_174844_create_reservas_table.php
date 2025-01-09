<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->enum('estado', ['APROBADO', 'CANCELADO', 'REPROGRAMADO', 'EN CURSO', 'EFECTUADO']);
            $table->timestamps();
            $table->foreignId('cliente_id')->constrained();
            $table->foreignId('mesa_id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
