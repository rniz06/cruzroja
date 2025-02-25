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
        DB::statement("
            CREATE 
            VIEW `vt_voluntarios_contactos` AS
                SELECT 
                    `vc`.`id_voluntario_contacto` AS `id_voluntario_contacto`,
                    `vc`.`voluntario_id` AS `voluntario_id`,
                    `v`.`nombres` AS `nombres`,
                    `v`.`apellido_paterno` AS `apellido_paterno`,
                    `v`.`apellido_materno` AS `apellido_materno`,
                    `v`.`cedula` AS `cedula`,
                    `vc`.`direccion` AS `direccion`,
                    `vc`.`departamento_id` AS `departamento_id`,
                    `d`.`departamento` AS `departamento`,
                    `vc`.`ciudad_id` AS `ciudad_id`,
                    `c`.`ciudad` AS `ciudad`,
                    `vc`.`correo_electronico` AS `correo_electronico`,
                    `vc`.`tel_particular` AS `tel_particular`,
                    `vc`.`tel_trabajo` AS `tel_trabajo`,
                    `vc`.`celular` AS `celular`,
                    `vc`.`deleted_at` AS `deleted_at`
                FROM
                    (((`voluntarios_contactos` `vc`
                    JOIN `voluntarios` `v` ON (`v`.`id_voluntario` = `vc`.`voluntario_id`))
                    JOIN `py_departamentos` `d` ON (`d`.`id_departamento` = `vc`.`departamento_id`))
                    JOIN `py_ciudades` `c` ON (`c`.`id_ciudad` = `vc`.`ciudad_id`));
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vt_voluntarios_contactos');
    }
};
