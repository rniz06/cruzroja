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
            $table->foreignId('id_usuario')->nullable()->constrained('users', 'id_usuario');
            $table->dateTime('fecha_hora');
            $table->string('grupo', 30)->nullable();
            $table->foreignId('servicio_id')->nullable()->constrained('servicios', 'id_servicio');
            $table->foreignId('movil_id')->nullable()->constrained('moviles', 'id_movil');
            $table->foreignId('acargo_id')->nullable()->constrained('voluntarios', 'id_voluntario');
            $table->foreignId('vol_rea_rev_id')->nullable()->constrained('voluntarios', 'id_voluntario');
            $table->integer('km_inicial')->nullable();
            $table->integer('km_final')->nullable();
            $table->boolean('carga_combustible')->nullable();
            $table->integer('monto')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
