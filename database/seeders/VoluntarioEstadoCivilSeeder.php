<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoluntarioEstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estadoCivil = [
            "SOLTERO",
            "CASADO",
            "VIUDO",
            "DIVORCIADO",
            "CONCUBINO",
        ];

        // Iterar sobre el array de estados y insertar cada una en la base de datos
        foreach ($estadoCivil as $registro) {
            DB::table('voluntarios_estado_civil')->insert([
                'estado_civil' => $registro,
            ]);
        }
    }
}
