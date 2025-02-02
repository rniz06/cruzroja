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
        Schema::create('voluntarios', function (Blueprint $table) {
            $table->id('id_voluntario');
            $table->string('nombre_completo', 100);
            $table->string('ci', 15)->unique()->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('telefono', 20)->unique()->nullable();
            $table->unsignedBigInteger('ciudad_id')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedBigInteger('sexo_id')->nullable();
            $table->boolean('es_tem')->nullable();
            $table->timestamps();

            $table->foreign('ciudad_id')->references('id_ciudad')->on('ciudades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('estado_id')->references('id_voluntario_estado')->on('voluntarios_estados')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sexo_id')->references('id_voluntario_sexo')->on('voluntarios_sexo')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voluntarios');
    }
};
