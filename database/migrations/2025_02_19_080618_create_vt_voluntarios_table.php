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
            VIEW `vt_voluntarios` AS
                SELECT 
                    `v`.`id_voluntario` AS `id_voluntario`,
                    `v`.`nombres` AS `nombres`,
                    `v`.`apellido_paterno` AS `apellido_paterno`,
                    `v`.`apellido_materno` AS `apellido_materno`,
                    `v`.`cedula` AS `cedula`,
                    `v`.`fecha_nacimiento` AS `fecha_nacimiento`,
                    `v`.`edad` AS `edad`,
                    `v`.`lugar_nacimiento_id` AS `lugar_nacimiento_id`,
                    `v`.`nacionalidad_id` AS `nacionalidad_id`,
                    `v`.`sexo_id` AS `sexo_id`,
                    `v`.`estado_civil_id` AS `estado_civil_id`,
                    `v`.`grupo_sanguineo_id` AS `grupo_sanguineo_id`,
                    `v`.`estado_id` AS `estado_id`,
                    `v`.`grado_estudio_id` AS `grado_estudio_id`,
                    `v`.`profesion_id` AS `profesion_id`,
                    `v`.`deleted_at` AS `deleted_at`,
                    `c`.`ciudad` AS `lugar_nacimiento`,
                    `p`.`pais` AS `nacionalidad`,
                    `vs`.`sexo` AS `sexo`,
                    `vec`.`estado_civil` AS `estado_civil`,
                    `vgs`.`grupo_sanguineo` AS `grupo_sanguineo`,
                    `ve`.`voluntario_estado` AS `voluntario_estado`,
                    `vge`.`grado_estudio` AS `grado_estudio`,
                    `vp`.`profesion` AS `profesion`
                FROM
                    ((((((((`voluntarios` `v`
                    LEFT JOIN `py_ciudades` `c` ON (`v`.`lugar_nacimiento_id` = `c`.`id_ciudad`))
                    LEFT JOIN `paises` `p` ON (`v`.`nacionalidad_id` = `p`.`id_pais`))
                    LEFT JOIN `voluntarios_sexo` `vs` ON (`v`.`sexo_id` = `vs`.`id_voluntario_sexo`))
                    LEFT JOIN `voluntarios_estado_civil` `vec` ON (`v`.`estado_civil_id` = `vec`.`idvoluntario_estado_civil`))
                    LEFT JOIN `voluntarios_grupo_sanguineo` `vgs` ON (`v`.`grupo_sanguineo_id` = `vgs`.`idvoluntario_grupo_sanguineo`))
                    LEFT JOIN `voluntarios_estados` `ve` ON (`v`.`estado_id` = `ve`.`id_voluntario_estado`))
                    LEFT JOIN `voluntarios_grado_estudios` `vge` ON (`v`.`grado_estudio_id` = `vge`.`idvoluntario_grado_estudio`))
                    LEFT JOIN `voluntarios_profesiones` `vp` ON (`v`.`profesion_id` = `vp`.`id_voluntario_profesion`))
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
