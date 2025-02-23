<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovilTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            "R2",
            "R3",
            "R4",
        ];

        // Iterar sobre el array de tipos y insertar cada uno en la base de datos
        foreach ($tipos as $tipo) {
            DB::table('moviles_tipos')->insert([
                'movil_tipo' => $tipo,
            ]);
        }
    }
}
