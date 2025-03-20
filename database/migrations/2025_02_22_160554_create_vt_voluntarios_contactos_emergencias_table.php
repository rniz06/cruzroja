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
        // DB::statement("DROP VIEW IF EXISTS `vt_voluntarios_contactos_emergencias`");
        // DB::statement("
        //     CREATE VIEW vt_voluntarios_contactos_emergencias AS
        //     SELECT
        //         vce.idvoluntario_contacto_emergencia,
        //         vce.voluntario_id,
        //         vce.nombre_completo,
        //         vce.telefono,
        //         vce.parentesco_id,
        //         vce.deleted_at,
        //         v.nombres as voluntario_nombres,
        //         v.apellido_paterno as voluntario_apellido_paterno,
        //         v.apellido_materno as voluntario_apellido_materno,
        //         v.cedula as voluntario_cedula,
        //         vp.parentesco
        //     FROM voluntarios_contactos_emergencias vce

        //     INNER JOIN vt_voluntarios v ON (v.id_voluntario = vce.voluntario_id)
        //     INNER JOIN voluntarios_parentescos vp ON (vp.id_voluntario_parentesco = vce.parentesco_id);
        // ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('vt_voluntarios_contactos_emergencias');
    }
};
