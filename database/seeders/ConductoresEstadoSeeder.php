<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConductoresEstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('conductores_estados')->insert([
            'estado' => "ACTIVO",
        ]);

        DB::table('conductores_estados')->insert([
            'estado' => "INACTIVO",
        ]);
    }
}
