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
        Schema::table('voluntarios', function (Blueprint $table) {
            // $table->foreignId('filial_id')->constrained('filiales', 'id_filial')->nullable()->after('id_voluntario');
            $table->unsignedBigInteger('filial_id')->nullable()->after('id_voluntario');
            $table->foreign('filial_id')->references('id_filial')->on('filiales')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('voluntarios', function (Blueprint $table) {
            $table->dropForeign(['filial_id']);
            $table->dropColumn('filial_id');
        });
    }
};
