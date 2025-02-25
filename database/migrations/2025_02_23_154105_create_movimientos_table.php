<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id('id_movimiento');
            $table->foreignId('conductor_id')->constrained('conductores', 'id_conductor');
            $table->foreignId('movil_id')->constrained('moviles', 'id_movil');
            $table->foreignId('ciudad_id')->constrained('py_ciudades', 'id_ciudad');
            $table->foreignId('servicio_id')->constrained('servicios', 'id_servicio');
            $table->string('destino', 255);
            $table->dateTime('fecha_hora_salida');
            $table->string('km_inicial', 10);
            $table->foreignId('a_cargo')->constrained('voluntarios', 'id_voluntario');            
            $table->dateTime('fecha_hora_llegada');
            $table->string('km_final', 10);
            $table->integer('km_recorridos');
            $table->integer('can_tripulantes');
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
