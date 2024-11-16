<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // LISTADO DE SERVICIOS
        $servicios = [
            '10.22',
            '10.28',
            '10.33',
            '10.34',
            '10.40',
            '10.41',
            '10.42',
            '10.43',
            '10.49',
            'OTROS'
        ];

        // Iterar sobre el array de distritos y insertar cada uno en la base de datos
        foreach ($servicios as $servicio) {
            DB::table('servicios')->insert([
                'servicio' => $servicio,
            ]);
        }
    }
}
