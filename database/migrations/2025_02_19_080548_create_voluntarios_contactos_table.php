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
        Schema::create('voluntarios_contactos', function (Blueprint $table) {
            $table->id('id_voluntario_contacto');
            $table->unsignedBigInteger('voluntario_id')->nullable();
            $table->string('direccion', 75);
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->unsignedBigInteger('ciudad_id')->nullable();
            $table->string('correo_electronico', 40);
            $table->string('tel_particular', 20);
            $table->string('tel_trabajo', 20);
            $table->string('celular', 20);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('voluntario_id')->references('id_voluntario')->on('voluntarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('departamento_id')->references('id_departamento')->on('py_departamentos')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('ciudad_id')->references('id_ciudad')->on('py_ciudades')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voluntarios_contactos');
    }
};
