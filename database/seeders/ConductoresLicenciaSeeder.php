<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConductoresLicenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('conductores_licencias')->insert([
            'clase' => "MOTOCICLISTA",
        ]);

        DB::table('conductores_licencias')->insert([
            'clase' => "PARTICULAR",
        ]);

        DB::table('conductores_licencias')->insert([
            'clase' => "EXTRANJERO",
        ]);

        DB::table('conductores_licencias')->insert([
            'clase' => "PROFESIONAL A",
        ]);

        DB::table('conductores_licencias')->insert([
            'clase' => "PROFESIONAL A SUPERIOR",
        ]);

        DB::table('conductores_licencias')->insert([
            'clase' => "PROFESIONAL B",
        ]);

        DB::table('conductores_licencias')->insert([
            'clase' => "PROFESIONAL B SUPERIOR",
        ]);

        DB::table('conductores_licencias')->insert([
            'clase' => "PROFESIONAL C",
        ]);

        DB::table('conductores_licencias')->insert([
            'clase' => "PROFESIONAL D",
        ]);
    }
}
