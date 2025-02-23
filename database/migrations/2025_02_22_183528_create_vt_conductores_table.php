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
        DB::statement("DROP VIEW IF EXISTS `vt_conductores");
        DB::statement("
            CREATE VIEW `vt_conductores` AS
            SELECT
                c.id_conductor,
                c.voluntario_id,
                c.licencia_id,
                c.estado_id,
                c.es_tem,
                c.deleted_at,
                v.nombres,
                v.apellido_paterno,
                v.apellido_materno,
                v.cedula,
                v.edad,
                cl.licencia,
                ce.conductor_estado
            FROM conductores c
            INNER JOIN vt_voluntarios v ON (v.id_voluntario = c.voluntario_id)
            INNER JOIN conductores_licencias cl ON (cl.id_conductor_licencia = c.licencia_id)
            INNER JOIN conductores_estados ce ON (ce.id_conductor_estado = c.estado_id);
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vt_conductores');
    }
};
