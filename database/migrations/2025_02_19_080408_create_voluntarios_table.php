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
            $table->string('nombres', 50);
            $table->string('apellido_paterno', 20);
            $table->string('apellido_materno', 20);
            $table->string('cedula', 15)->unique();
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->unsignedBigInteger('lugar_nacimiento_id')->nullable();
            $table->unsignedBigInteger('nacionalidad_id')->nullable();
            $table->unsignedBigInteger('sexo_id')->nullable();
            $table->unsignedBigInteger('estado_civil_id')->nullable();
            $table->unsignedBigInteger('grupo_sanguineo_id')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedBigInteger('grado_estudio_id')->nullable();
            $table->unsignedBigInteger('profesion_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('lugar_nacimiento_id')->references('id_ciudad')->on('py_ciudades')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('nacionalidad_id')->references('id_pais')->on('paises')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('sexo_id')->references('id_voluntario_sexo')->on('voluntarios_sexo')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('estado_civil_id')->references('idvoluntario_estado_civil')->on('voluntarios_estado_civil')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('grupo_sanguineo_id')->references('idvoluntario_grupo_sanguineo')->on('voluntarios_grupo_sanguineo')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('estado_id')->references('id_voluntario_estado')->on('voluntarios_estados')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('grado_estudio_id')->references('idvoluntario_grado_estudio')->on('voluntarios_grado_estudios')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('profesion_id')->references('id_voluntario_profesion')->on('voluntarios_profesiones')->onUpdate('cascade')->onDelete('set null');
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
