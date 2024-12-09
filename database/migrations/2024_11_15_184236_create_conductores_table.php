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
            $table->string('nombres',50);
            $table->string('apellidos',50)->nullable();
            $table->string('nombre_completo',100);
            $table->string('ci_conductor',20)->unique();
            $table->unsignedBigInteger('conductor_estado_id')->nullable();
            $table->unsignedBigInteger('conductor_licencia_id')->nullable();
            $table->timestamps();

            $table->foreign('conductor_estado_id')->references('id_conductor_estado')->on('conductores_estados')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('conductor_licencia_id')->references('id_conductor_licencia')->on('conductores_licencias')->onUpdate('cascade')->onDelete('set null');
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
