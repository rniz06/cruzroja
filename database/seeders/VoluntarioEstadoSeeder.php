<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoluntarioEstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            "ACTIVO",
            "INACTIVO",
        ];

        // Iterar sobre el array de estados y insertar cada una en la base de datos
        foreach ($estados as $registro) {
            DB::table('voluntarios_estados')->insert([
                'voluntario_estado' => $registro,
            ]);
        }
    }
}
