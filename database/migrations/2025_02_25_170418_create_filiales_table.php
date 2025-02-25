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
        Schema::create('filiales', function (Blueprint $table) {
            $table->id('id_filial');
            $table->foreignId('ciudad_id')->nullable()->constrained('py_ciudades', 'id_ciudad');
            $table->foreignId('departamento_id')->nullable()->constrained('py_departamentos', 'id_departamento');
            $table->foreignId('presidente_id')->nullable()->constrained('voluntarios', 'id_voluntario');
            $table->string('correo')->nullable();
            $table->string('ubicacion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filiales');
    }
};
