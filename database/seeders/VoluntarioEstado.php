<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoluntarioEstado extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // LISTADO DE ESTADOS
        $estados = [
            'ACTIVO',
            'INACTIVO',
        ];

        // Iterar sobre el array de distritos y insertar cada uno en la base de datos
        foreach ($estados as $estado) {
            DB::table('voluntarios_estados')->insert([
                'estado' => $estado,
            ]);
        }
    }
}
