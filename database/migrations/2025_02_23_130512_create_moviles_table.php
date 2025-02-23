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
        Schema::create('moviles', function (Blueprint $table) {
            $table->id('id_movil');
            $table->unsignedBigInteger('combustible_id')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedBigInteger('tipo_id')->nullable();
            $table->string('km_actual', 15);
            $table->string('nro_chapa', 10);
            $table->string('nro_chasis', 30);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('combustible_id')->references('id_movil_combustible')->on('moviles_combustibles');
            $table->foreign('estado_id')->references('id_movil_estado')->on('moviles_estados');
            $table->foreign('tipo_id')->references('id_movil_tipo')->on('moviles_tipos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moviles');
    }
};
