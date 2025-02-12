<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->integer('cantidad_asientos');
            $table->decimal('precio', total: 7, places: 2);
            $table->integer('piso');
            $table->enum('estado', ['OCUPADO', 'LIBRE', 'MANTENIMIENTO'])->default('LIBRE');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
