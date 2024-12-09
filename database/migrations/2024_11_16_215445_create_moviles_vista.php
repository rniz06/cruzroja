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
        DB::statement("DROP VIEW IF EXISTS vista_moviles");
        DB::statement("
CREATE
VIEW `vista_moviles` AS
    SELECT
        `moviles`.`id_movil` AS `id_movil`,
        `moviles_combustibles`.`tipo_combustible` AS `tipo_combustible`,
        `moviles_estados`.`movil_estado` AS `movil_estado`,
        `moviles_tipos`.`movil_tipo` AS `movil_tipo`,
        `moviles`.`km_actual` AS `km_actual`,
        `moviles`.`movil_nro_chapa` AS `movil_nro_chapa`,
        `moviles`.`movil_chasis` AS `movil_chasis`,
        `moviles`.`movil_combustible_id` AS `movil_combustible_id`,
        `moviles`.`movil_estado_id` AS `movil_estado_id`,
        `moviles`.`movil_tipo_id` AS `movil_tipo_id`
    FROM
        (((`moviles`
        JOIN `moviles_combustibles` ON (`moviles`.`movil_combustible_id` = `moviles_combustibles`.`id_movil_combustible`))
        JOIN `moviles_estados` ON (`moviles`.`movil_estado_id` = `moviles_estados`.`id_movil_estado`))
        JOIN `moviles_tipos` ON (`moviles`.`movil_tipo_id` = `moviles_tipos`.`id_movil_tipo`))
        ");
    }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('moviles_vista');
    // }
};
