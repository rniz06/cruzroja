<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuardiaItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // LISTADO DE ITEMS
        $items = [
            'Luz Baja',
            'Luz Alta',
            'Luz de Freno',
            'Luz Estacionamiento',
            'Baliza',
            'Sirena',
            'Reflectores',
            'Luz Interior',
            'Limpiaparabrisas',
            'Radio Móvil',
            'Levanta Vidrio Der.',
            'Levanta Vidrio Izq.',
            'Marcador Combustible',
            'Bateria',
            'Rueda Auxilio',
            'Gato / Yacaré',
            'Llave p/ Rueda',
            'Extintor',
            'Luz De Dirección',
            'Camilla',
            'Nivel De Aceite Motor',
            'Nivel De Combustible',
            'Nivel Fluido de Freno',
            'Nivel Agua Radiador',
            'Nivel Fluido Dirección',
            'Estado Cubierta Del.',
            'Estado Cubierta Tra.',
            'Basurero Limpio',
            'Lavado Interior',
            'Lavado Exterior',
            'Desinfección',
        ];

        // Iterar sobre el array de distritos y insertar cada uno en la base de datos
        foreach ($items as $item) {
            DB::table('guardias_items')->insert([
                'item' => $item,
            ]);
        }
    }
}
