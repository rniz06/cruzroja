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
        Schema::create('guardias_items_controles', function (Blueprint $table) {
            $table->id('id_guardia_item_control');
            $table->unsignedBigInteger('guardia_id')->nullable();
            $table->unsignedBigInteger('guardia_item_id')->nullable();
            $table->enum('verificacion', ['Si', 'No', 'Bajo', 'Normal', 'Falta', 'Dañado','En Llanta']);
            $table->timestamps();

            $table->foreign('guardia_id')->references('id_guardia')->on('guardias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('guardia_item_id')->references('id_guardia_item')->on('guardias_items')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardias_items_controles');
    }
};
