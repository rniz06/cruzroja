<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovilCombustibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $combustibles = [
            "DIESEL",
            "NAFTA",
            "ELECTRICO",
            "FLEX",
            "ALCOHOL",
            "GAS",
        ];

        // Iterar sobre el array de estados y insertar cada una en la base de datos
        foreach ($combustibles as $combustible) {
            DB::table('moviles_combustibles')->insert([
                'tipo_combustible' => $combustible,
            ]);
        }
    }
}
