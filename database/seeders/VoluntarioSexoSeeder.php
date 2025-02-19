<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoluntarioSexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sexos = [
            "MASCULINO",
            "FEMENINO",
        ];

        // Iterar sobre el array de estados y insertar cada una en la base de datos
        foreach ($sexos as $registro) {
            DB::table('voluntarios_sexo')->insert([
                'sexo' => $registro,
            ]);
        }
    }
}
