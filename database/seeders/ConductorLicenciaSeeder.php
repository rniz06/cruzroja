<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConductorLicenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $licencias = [
            "MOTOCICLISTA",
            "PARTICULAR",
            "EXTRANJERO",
            "PROFESIONAL A",
            "PROFESIONAL A SUPERIOR",
            "PROFESIONAL B",
            "PROFESIONAL B SUPERIOR",
            "PROFESIONAL C",
            "PROFESIONAL D",
        ];

        // Iterar sobre el array de estados y insertar cada una en la base de datos
        foreach ($licencias as $licencia) {
            DB::table('conductores_licencias')->insert([
                'licencia' => $licencia,
            ]);
        }
    }
}
