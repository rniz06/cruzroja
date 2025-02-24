<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserRoleYPermisoSeeder::class,
            PaisSeeder::class,
            VoluntarioEstadoCivilSeeder::class,
            VoluntarioEstadoSeeder::class,
            VoluntarioEstadoCivilSeeder::class,
            VoluntarioSexoSeeder::class,
            VoluntarioGrupoSanguineoSeeder::class,
            VoluntarioParentescoSeeder::class,
            VoluntarioGradoEstudioSeeder::class,
            VoluntarioProfesion::class,
            ConductorEstadoSeeder::class,
            ConductorLicenciaSeeder::class,
            MovilTipoSeeder::class,
            MovilCombustibleSeeder::class,
            MovilEstadoSeeder::class,
            ServicioSeeder::class,
        ]);
    }
}
