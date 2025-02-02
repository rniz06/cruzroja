<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoluntarioSexo extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // LISTADO DE ESTADOS
        $sexos = [
            'MASCULINO',
            'FEMENINO',
        ];

        // Iterar sobre el array de distritos y insertar cada uno en la base de datos
        foreach ($sexos as $sexo) {
            DB::table('voluntarios_sexo')->insert([
                'sexo' => $sexo,
            ]);
        }
    }
}
