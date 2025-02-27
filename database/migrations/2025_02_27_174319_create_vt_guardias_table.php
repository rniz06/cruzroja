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
        DB::statement('
            CREATE VIEW vt_guardias AS
            SELECT
                g.id_guardia,
                g.id_usuario,
                g.fecha_hora,
                g.grupo,
                g.servicio_id,
                g.movil_id,
                g.acargo_id,
                g.vol_rea_rev_id,
                g.km_inicial,
                g.km_final,
                g.carga_combustible,
                g.monto,
                g.observaciones,
                g.deleted_at,
                s.servicio,
                m.movil_tipo,
                m.nro_chapa,
                a.nombre_completo as acargo_nombre_completo,
                a.cedula as acargo_cedula,
                v.nombre_completo as vol_rea_rev_nombre_completo,
                v.cedula as vol_rea_rev_cedula
            FROM guardias g
            JOIN servicios s ON (s.id_servicio = g.servicio_id)
            JOIN vt_moviles m ON (m.id_movil = g.movil_id)
            JOIN vt_voluntarios a ON (a.id_voluntario = g.acargo_id)
            JOIN vt_voluntarios v ON (v.id_voluntario = g.vol_rea_rev_id)
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vt_guardias');
    }
};
