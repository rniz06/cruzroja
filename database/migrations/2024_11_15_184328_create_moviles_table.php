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
            $table->unsignedBigInteger('movil_combustible_id')->nullable();
            $table->unsignedBigInteger('movil_estado_id')->nullable();
            $table->unsignedBigInteger('movil_tipo_id')->nullable();
            $table->string('km_actual', 20)->nullable();
            $table->string('movil_nro_chapa', 10)->nullable();
            $table->string('movil_chasis', 100)->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('movil_combustible_id')->references('id_movil_combustible')->on('moviles_combustibles')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('movil_estado_id')->references('id_movil_estado')->on('moviles_estados')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('movil_tipo_id')->references('id_movil_tipo')->on('moviles_tipos')->onUpdate('cascade')->onDelete('set null');
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
