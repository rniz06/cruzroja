<?php

namespace App\Livewire\Voluntarios;

use App\Models\Vistas\VtVoluntario;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $nombres = "";
    public $cedula = "";
    public $fecha_nacimiento = "";
    public $edad = "";
    public $lugar_nacimiento = "";
    public $nacionalidad = "";
    public $sexo = "";
    public $estado_civil = "";
    public $grupo_sanguineo = "";
    public $estado = "";
    public $paginado = 5;

    public function render()
    {
        $voluntarios = VtVoluntario::buscadorNombres($this->nombres)
            ->buscadorCedula($this->cedula)
            ->buscadorFechanacimiento($this->fecha_nacimiento)
            ->buscadorEdad($this->edad)
            ->buscadorLugarnacimiento($this->lugar_nacimiento)
            ->buscadorNacionalidad($this->nacionalidad)
            ->buscadorSexo($this->sexo)
            ->buscadorEstadocivil($this->estado_civil)
            ->buscadorGruposanguineo($this->grupo_sanguineo)
            ->buscadorEstado($this->estado)
            ->paginate($this->paginado);
        return view('livewire.voluntarios.tabla', compact('voluntarios'));
    }
}
