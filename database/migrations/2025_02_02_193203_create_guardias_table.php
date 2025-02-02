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
        Schema::create('guardias', function (Blueprint $table) {
            $table->id('id_guardia');
            $table->dateTime('fecha_hora');
            $table->string('grupo', 50)->nullable();
            $table->unsignedBigInteger('tipo_servicio_id')->nullable();
            $table->string('tipo_servicio_aclaracion', 50)->nullable();
            $table->unsignedBigInteger('movil_id')->nullable();
            $table->unsignedBigInteger('a_cargo_id')->nullable();
            $table->unsignedBigInteger('vol_rea_rev_id')->nullable();
            $table->integer('km_inicial')->nullable();
            $table->integer('km_final')->nullable();
            $table->boolean('carga_combustible')->nullable();
            $table->integer('monto')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('tipo_servicio_id')->references('id_tipo_servicio')->on('tipo_servicios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('movil_id')->references('id_movil')->on('moviles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('a_cargo_id')->references('id_voluntario')->on('voluntarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('vol_rea_rev_id')->references('id_voluntario')->on('voluntarios')->onUpdate('cascade')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardias');
    }
};
