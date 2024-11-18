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
        DB::statement("DROP VIEW IF EXISTS vista_registro_movimientos");
        DB::statement("
        CREATE VIEW vista_registro_movimientos AS
SELECT
    registro_movimientos.id_registro_movimiento,
    conductores.nombre_completo AS nombre_conductor,
    conductores.ci_conductor AS ci_conductor,
    moviles_combustibles.tipo_combustible,
    moviles_estados.movil_estado,
    moviles_tipos.movil_tipo,
    moviles.movil_nro_chapa,
    moviles.movil_chasis,
    ciudades.ciudad AS ciudad,
    servicios.servicio AS nombre_servicio,
    servicios_clasificaciones.servicio_clasificacion AS clasificacion_servicio,
    registro_movimientos.fecha_hora_salida,
    registro_movimientos.km_inicial,
    registro_movimientos.destino,
    registro_movimientos.a_cargo,
    registro_movimientos.fecha_hora_llegada,
    registro_movimientos.km_final,
    registro_movimientos.km_recorrido,
    registro_movimientos.observaciones,
    registro_movimientos.conductor_id,
    registro_movimientos.movil_id AS movil_id,
    registro_movimientos.ciudad_id,
    registro_movimientos.servicio_id,
    registro_movimientos.clasificacion_servicio_id,
    moviles.movil_combustible_id,
    moviles.movil_estado_id,
    moviles.movil_tipo_id
FROM
    registro_movimientos
JOIN
    conductores ON registro_movimientos.conductor_id = conductores.id_conductor
JOIN
    moviles ON registro_movimientos.movil_id = moviles.id_movil
JOIN
    moviles_combustibles ON moviles.movil_combustible_id = moviles_combustibles.id_movil_combustible
JOIN
    moviles_estados ON moviles.movil_estado_id = moviles_estados.id_movil_estado
JOIN
    moviles_tipos ON moviles.movil_tipo_id = moviles_tipos.id_movil_tipo
JOIN
    ciudades ON registro_movimientos.ciudad_id = ciudades.id_ciudad
JOIN
    servicios ON registro_movimientos.servicio_id = servicios.id_servicio
JOIN
    servicios_clasificaciones ON registro_movimientos.clasificacion_servicio_id = servicios_clasificaciones.id_servicio_clasificacion;

        ");
    }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('registro_movimiemtos_vista');
    // }
};
