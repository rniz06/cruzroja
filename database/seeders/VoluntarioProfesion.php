<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoluntarioProfesion extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profesiones = [
            "ABOGADO/A", "ACTUARIO/A", "ADMINISTRADOR/A", "AGRICULTOR/A", "AGRÓNOMO/A", "ALBAÑIL",
            "ANIMADOR/A", "ANTROPÓLOGO/A", "APICULTOR/A", "ARQUITECTO/A", "ARTESANO/A", "ASTRÓNOMO/A",
            "BARRANDERO/A", "BIBLIOTECARIO/A", "BIÓLOGO/A", "BOMBERO/A", "BOTÁNICO/A", "CAJERO/A",
            "CALÍGRAFO/A", "CAMARERO/A", "CARPINTERO/A", "CARNICERO/A", "CERrajero/a", "CHOFER",
            "COCINERO/A", "CONTADOR/A", "DESARROLLADOR/A WEB", "DISEÑADOR/A GRÁFICO", "ECONOMISTA",
            "ENFERMERO/A", "ESCULTOR/A", "ESCRITOR/A", "FARMACÓLOGO/A", "FILÓLOGO/A", "FILÓSOFO/A",
            "FÍSICO/A", "FONOAUDIÓLOGO/A", "FONTANERO O PLOMERO/A", "FRUTERO/A", "FUMIGADOR/A",
            "GEÓGRAFO/A", "GUARDABOSQUES", "HERRERO/A", "HISTORIADOR/A", "IMPRENTERO/A", "INGENIERO/A",
            "JOYERO/A", "JARDINERO/A", "KINESIÓLOGO/A", "LAVANDERO/A", "LECHERO/A", "LEÑADOR/A",
            "LINGÜISTA", "LUTIER", "MATEMÁTICO/A", "MÉDICO/A CIRUJANO/A", "MECÁNICO/A", "METEORÓLOGO/A",
            "MÚSICO/A", "OBRERO/A", "OBSTETRA", "ODONTÓLOGO/A", "OTROS", "ÓPTICO", "PALEONTÓLOGO/A",
            "PANADERO/A", "PARAMÉDICO/A", "PASTOR/A", "PELETERO/A", "PELUQUERO/A", "PERIODISTA",
            "PESCADOR/A", "PINTOR/A", "POLITÓLOGO/A", "PROFESOR/A", "PSICOANALISTA", "PSICÓLOGO/A",
            "RADIOLOGO/A", "RADIOLOGO/A", "RELOJERO/A", "REPARTIDOR/A", "SASTRE", "SOLDADOR/A",
            "SOCIÓLOGO/A", "TÉCNICO/A DE SONIDO", "TELEFONISTA", "TORNERO/A", "TRANSPORTISTA",
            "TRABAJADOR/A SOCIAL", "TRADUCTOR/A", "VENDEDOR/A", "VETERINARIO/A", "VIGILANTE", "ZAPATERO/A"
        ];
        
        // Iterar sobre el array de estados y insertar cada una en la base de datos
        foreach ($profesiones as $profesion) {
            DB::table('voluntarios_profesiones')->insert([
                'profesion' => $profesion,
            ]);
        }
    }
}
