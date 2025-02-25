<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoluntarioGradoEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grados_estudios = [
            'Educación Inicial y Preescolar',
            'Educación Escolar Básica',
            'Educación Media',
            'Educación Superior',
            'Formación Docente',
        ];
        
        // Iterar sobre el array de estados y insertar cada una en la base de datos
        foreach ($grados_estudios as $grado_estudio) {
            DB::table('voluntarios_grado_estudios')->insert([
                'grado_estudio' => $grado_estudio,
            ]);
        }
    }
}
