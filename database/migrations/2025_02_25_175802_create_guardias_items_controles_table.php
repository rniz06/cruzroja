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
            $table->foreignId('guardia_id')->constrained('guardias', 'id_guardia');
            $table->foreignId('guardia_item_id')->constrained('guardias_items', 'id_guardia_item');
            $table->enum('verificacion', ['Si', 'No', 'Bajo', 'Normal', 'Falta', 'Dañado','En Llanta']);
            $table->timestamps();
            $table->softDeletes();
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
