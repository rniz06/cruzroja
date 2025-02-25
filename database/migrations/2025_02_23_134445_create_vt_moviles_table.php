<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vt_moviles");
        DB::statement("
            CREATE VIEW `vt_moviles` AS
            SELECT
                m.id_movil,
                m.combustible_id,
                m.estado_id,
                m.tipo_id,
                m.km_actual,
                m.nro_chapa,
                m.nro_chasis,
                m.deleted_at,
                mc.tipo_combustible,
                me.movil_estado,
                mt.movil_tipo
            FROM moviles m
            INNER JOIN moviles_combustibles mc ON (mc.id_movil_combustible = m.combustible_id)
            INNER JOIN moviles_estados me ON (me.id_movil_estado = m.estado_id)
            INNER JOIN moviles_tipos mt ON (mt.id_movil_tipo = m.tipo_id)
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('vt_moviles');
    }
};
