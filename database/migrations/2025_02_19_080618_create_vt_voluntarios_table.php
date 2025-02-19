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
        DB::statement("DROP VIEW IF EXISTS `vt_voluntarios`");
        DB::statement("
            CREATE 
                VIEW cruzroja_db.vt_voluntarios AS
                    SELECT 
                        v.id_voluntario AS id_voluntario,
                        v.nombres AS nombres,
                        v.apellido_paterno AS apellido_paterno,
                        v.apellido_materno AS apellido_materno,
                        v.cedula AS cedula,
                        v.fecha_nacimiento AS fecha_nacimiento,
                        v.edad AS edad,
                        v.lugar_nacimiento_id AS lugar_nacimiento_id,
                        v.nacionalidad_id AS nacionalidad_id,
                        v.sexo_id AS sexo_id,
                        v.estado_civil_id AS estado_civil_id,
                        v.grupo_sanguineo_id AS grupo_sanguineo_id,
                        v.estado_id AS estado_id,
                        v.deleted_at AS deleted_at,
                        c.ciudad AS lugar_nacimiento,
                        p.pais AS nacionalidad,
                        vs.sexo AS sexo,
                        vec.estado_civil AS estado_civil,
                        vgs.grupo_sanguineo AS grupo_sanguineo,
                        ve.voluntario_estado AS voluntario_estado
                    FROM
                        ((((((cruzroja_db.voluntarios v
                        LEFT JOIN cruzroja_db.py_ciudades c ON (v.lugar_nacimiento_id = c.id_ciudad))
                        LEFT JOIN cruzroja_db.paises p ON (v.nacionalidad_id = p.id_pais))
                        LEFT JOIN cruzroja_db.voluntarios_sexo vs ON (v.sexo_id = vs.id_voluntario_sexo))
                        LEFT JOIN cruzroja_db.voluntarios_estado_civil vec ON (v.estado_civil_id = vec.idvoluntario_estado_civil))
                        LEFT JOIN cruzroja_db.voluntarios_grupo_sanguineo vgs ON (v.grupo_sanguineo_id = vgs.idvoluntario_grupo_sanguineo))
                        LEFT JOIN cruzroja_db.voluntarios_estados ve ON (v.estado_id = ve.id_voluntario_estado))
        ");
    }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('vt_voluntarios');
    // }
};
