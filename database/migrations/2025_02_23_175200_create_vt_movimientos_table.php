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
        CREATE VIEW `vt_movimientos` AS
            SELECT
                -- Datos del movimiento
                m.id_movimiento,
                m.conductor_id,
                m.movil_id,
                m.ciudad_id,
                m.servicio_id,
                m.destino,
                m.fecha_hora_salida,
                m.km_inicial,
                m.a_cargo,
                m.fecha_hora_llegada,
                m.km_final,
                m.km_recorridos,
                m.can_tripulantes,
                m.observaciones,
                m.created_at,
                m.deleted_at,

                -- Datos del conductor (vt_conductores)
                c.nombres AS cond_nombres,
                c.apellido_paterno AS cond_apellido_paterno,
                c.apellido_materno AS cond_apellido_materno,
                CONCAT(c.nombres, ' ', c.apellido_paterno, ' ', c.apellido_materno) AS cond_nombre_completo,
                c.cedula AS cond_cedula,
                c.edad AS cond_edad,
                c.licencia AS cond_licencia,

                -- Datos del móvil (vt_moviles)
                mv.movil_tipo,
                mv.tipo_combustible,
                mv.nro_chapa AS movil_nro_chapa,
                mv.nro_chasis AS movil_nro_chasis,

                -- Datos de la ciudad (py_ciudades)
                ciu.ciudad,

                -- Datos del servicio (servicios)
                s.servicio,

                -- Datos de la persona a cargo (vt_voluntarios)
                v.nombres AS acargo_nombres,
                v.apellido_paterno AS acargo_apellido_paterno,
                v.apellido_materno AS acargo_apellido_materno,
                CONCAT(v.nombres, ' ', v.apellido_paterno, ' ', v.apellido_materno) AS acargo_nombre_completo,
                v.cedula AS acargo_cedula,
                v.edad AS acargo_edad,
                v.sexo AS acargo_sexo,
                v.grupo_sanguineo AS acargo_grupo_sanguineo

            FROM movimientos AS m
            INNER JOIN vt_conductores AS c ON c.id_conductor = m.conductor_id
            INNER JOIN vt_moviles AS mv ON mv.id_movil = m.movil_id
            INNER JOIN py_ciudades AS ciu ON ciu.id_ciudad = m.ciudad_id
            INNER JOIN servicios AS s ON s.id_servicio = m.servicio_id
            INNER JOIN vt_voluntarios AS v ON v.id_voluntario = m.a_cargo;

        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vt_movimientos;');
    }
};
