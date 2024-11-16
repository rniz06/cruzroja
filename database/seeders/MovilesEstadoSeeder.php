<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovilesEstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('moviles_estados')->insert([
            'movil_estado' => "ACTIVO",
        ]);

        DB::table('moviles_estados')->insert([
            'movil_estado' => "INACTIVO",
        ]);
    }
}
