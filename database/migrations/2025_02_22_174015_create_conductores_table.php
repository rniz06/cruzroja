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
        Schema::create('conductores', function (Blueprint $table) {
            $table->id('id_conductor');
            $table->unsignedBigInteger('voluntario_id')->unique()->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedBigInteger('licencia_id')->nullable();
            $table->boolean('es_tem')->default(false)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('voluntario_id')->references('id_voluntario')->on('voluntarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('estado_id')->references('id_conductor_estado')->on('conductores_estados')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('licencia_id')->references('id_conductor_licencia')->on('conductores_licencias')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conductores');
    }
};
