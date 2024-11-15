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
            $table->unsignedBigInteger('moviles_combustible_id')->nullable();
            $table->unsignedBigInteger('moviles_estado_id')->nullable();
            $table->unsignedBigInteger('moviles_tipo_id')->nullable();
            $table->string('km_actual')->nullable();
            $table->timestamps();

            $table->foreign('moviles_combustible_id')->references('id_moviles_combustibles')->on('moviles_combustibles')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('moviles_estado_id')->references('id_moviles_estados')->on('moviles_estados')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('moviles_tipo_id')->references('id_moviles_tipos')->on('moviles_tipos')->onUpdate('cascade')->onDelete('set null');
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
