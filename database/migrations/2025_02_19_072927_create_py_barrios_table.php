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
        Schema::create('py_barrios', function (Blueprint $table) {
            $table->id('id_barrio');
            $table->string('barrio', 50);
            $table->unsignedBigInteger('ciudad_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ciudad_id')->references('id_ciudad')->on('py_ciudades')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('py_barrios');
    }
};
