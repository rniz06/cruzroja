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
        Schema::create('moviles_observaciones', function (Blueprint $table) {
            $table->id('id_movil_observacion');
            $table->foreignId('movil_id')->constrained('moviles', 'id_movil')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('usuario_id')->constrained('users', 'id_usuario')->onUpdate('cascade')->onDelete('set null');
            $table->text('observacion');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moviles_observaciones');
    }
};
