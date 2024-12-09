<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosClasficacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // LISTADO DE SERVICIOS
        $serviciosClasificacion = [
            'PASTIZAL',
            'FORESTAL',
            'VIVIENDA',
            'MOTOCICLISTA',
            'VEHICULAR',
            'BASURAL',
            'ADMINISTRATIVO',
            'OTROS'
        ];

        // Iterar sobre el array de distritos y insertar cada uno en la base de datos
        foreach ($serviciosClasificacion as $clasificacion) {
            DB::table('servicios_clasificaciones')->insert([
                'servicio_clasificacion' => $clasificacion,
            ]);
        }
    }
}
