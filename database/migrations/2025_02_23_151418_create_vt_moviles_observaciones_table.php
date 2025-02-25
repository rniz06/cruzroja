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
        DB::statement("DROP VIEW IF EXISTS `vt_moviles_observaciones`");
        DB::statement("
            CREATE VIEW `vt_moviles_observaciones` AS
            SELECT
                mo.id_movil_observacion,
                mo.movil_id,
                mo.usuario_id,
                mo.observacion,
                mo.created_at,
                m.movil_tipo,
                m.tipo_combustible,
                m.nro_chapa,
                m.nro_chasis,
                m.km_actual,
                m.movil_estado,
                u.name as usuario_nombre
            FROM moviles_observaciones mo
            INNER JOIN vt_moviles m ON (m.id_movil = mo.movil_id)
            INNER JOIN users u ON (u.id_usuario = mo.usuario_id)
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vt_moviles_observaciones`");
    }
};
