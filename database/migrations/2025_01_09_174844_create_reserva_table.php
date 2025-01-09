<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cliente_id');
            $table->bigInteger('mesa_id');
            $table->date('fecha');
            $table->time('hora');
            $table->enum('estado', ['APROBADO', 'CANCELADO', 'REPROGRAMADO', 'EN CURSO', 'EFECTUADO']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
