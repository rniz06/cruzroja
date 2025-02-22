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
        Schema::create('voluntarios_contactos_emergencias', function (Blueprint $table) {
            $table->id('idvoluntario_contacto_emergencia');
            $table->unsignedBigInteger('voluntario_id')->nullable();
            $table->string('nombre_completo', 50);
            $table->string('telefono', 15);
            $table->unsignedBigInteger('parentesco_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('voluntario_id')->references('id_voluntario')->on('voluntarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('parentesco_id')->references('id_voluntario_parentesco')->on('voluntarios_parentescos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voluntarios_contactos_emergencias');
    }
};
