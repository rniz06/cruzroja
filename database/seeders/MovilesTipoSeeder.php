<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovilesTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('moviles_tipos')->insert([
            'movil_tipo' => "R2",
        ]);

        DB::table('moviles_tipos')->insert([
            'movil_tipo' => "R3",
        ]);

        DB::table('moviles_tipos')->insert([
            'movil_tipo' => "R4",
        ]);
    }
}
