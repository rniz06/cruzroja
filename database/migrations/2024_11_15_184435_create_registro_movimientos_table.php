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
        Schema::create('registro_movimientos', function (Blueprint $table) {
            $table->id('id_registro_movimiento');
            $table->unsignedBigInteger('conductor_id')->nullable();
            $table->unsignedBigInteger('movil_id')->nullable();
            $table->unsignedBigInteger('ciudad_id')->nullable();
            $table->unsignedBigInteger('servicio_id')->nullable();
            $table->unsignedBigInteger('clasificacion_servicio_id')->nullable();
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->dateTime('fecha_hora_salida');
            $table->string('km_inicial', 20);
            $table->string('destino')->nullable();
            $table->string('a_cargo')->nullable();
            $table->dateTime('fecha_hora_llegada');
            $table->integer('km_final');
            $table->integer('km_recorrido');
            $table->longText('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('conductor_id')->references('id_conductor')->on('conductores')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('movil_id')->references('id_movil')->on('moviles')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('ciudad_id')->references('id_ciudad')->on('ciudades')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('servicio_id')->references('id_servicio')->on('servicios')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('clasificacion_servicio_id')->references('id_servicio_clasificacion')->on('servicios_clasificaciones')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('usuario_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_movimientos');
    }
};
