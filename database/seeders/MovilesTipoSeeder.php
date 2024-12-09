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
            'movil_tipo' => "AB111",
        ]);

        DB::table('moviles_tipos')->insert([
            'movil_tipo' => "AB112",
        ]);

        DB::table('moviles_tipos')->insert([
            'movil_tipo' => "AR114",
        ]);

        DB::table('moviles_tipos')->insert([
            'movil_tipo' => "ARF113",
        ]);

        DB::table('moviles_tipos')->insert([
            'movil_tipo' => "AC110",
        ]);

    }
}
