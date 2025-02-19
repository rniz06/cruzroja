<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoluntarioGrupoSanguineoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grupos_sanguineos = [
            'Sin Datos',
            'A+',
            'A-',
            'B+',
            'B-',
            'AB+',
            'AB-',
            'O+',
            'O-',
        ];

        // Iterar sobre el array de estados y insertar cada una en la base de datos
        foreach ($grupos_sanguineos as $registro) {
            DB::table('voluntarios_grupo_sanguineo')->insert([
                'grupo_sanguineo' => $registro,
            ]);
        }
    }
}
