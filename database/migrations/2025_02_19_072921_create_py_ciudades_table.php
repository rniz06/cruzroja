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
        Schema::create('py_ciudades', function (Blueprint $table) {
            $table->id('id_ciudad');
            $table->string('ciudad', 50);
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('departamento_id')->references('id_departamento')->on('py_departamentos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('py_ciudades');
    }
};
