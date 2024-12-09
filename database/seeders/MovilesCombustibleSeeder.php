<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovilesCombustibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('moviles_combustibles')->insert([
            'tipo_combustible' => "DIESEL",
        ]);

        DB::table('moviles_combustibles')->insert([
            'tipo_combustible' => "NAFTA",
        ]);

        DB::table('moviles_combustibles')->insert([
            'tipo_combustible' => "ELECTRICO",
        ]);

        DB::table('moviles_combustibles')->insert([
            'tipo_combustible' => "FLEX",
        ]);

        DB::table('moviles_combustibles')->insert([
            'tipo_combustible' => "ALCOHOL",
        ]);

        DB::table('moviles_combustibles')->insert([
            'tipo_combustible' => "GAS",
        ]);
    }
}
