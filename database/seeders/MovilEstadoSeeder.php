<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovilEstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            "DISPONIBLE",
            "EN SERVICIO",
            "EN MANTENIMIENTO",
            "EN REPARACION",
            "DE BAJA",
        ];

        // Iterar sobre el array de estados y insertar cada una en la base de datos
        foreach ($estados as $estado) {
            DB::table('moviles_estados')->insert([
                'movil_estado' => $estado,
            ]);
        }
    }
}
