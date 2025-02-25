<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filiales = [
            ['ciudad_id' => 1, 'departamento_id' => 1, 'presidente_id' => null, 'correo' => 'asuncion@cruzroja.org.py', 'ubicacion' => 'Avda. Artigas c/ Andrés Barbero'],
        ];

        foreach ($filiales as $filial) {
            DB::table('filiales')->insert($filial);
        }

    }
}
