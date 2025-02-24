<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicios = [
            'GUARDIA EMERGENCIA',
            'COBERTURA',
            'GUARDIA ESPECIAL',
            'OTROS',
        ];

        foreach ($servicios as $servicio) {
            DB::table('servicios')->insert([
                'servicio' => $servicio,
            ]);
        }
    }
}
