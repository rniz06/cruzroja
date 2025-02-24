<?php

namespace App\Livewire\Conductores;

use App\Models\Vistas\VtConductor;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $nombre_completo = "";
    public $cedula = "";
    public $edad = "";
    public $licencia = "";
    public $conductor_estado = "";
    public $paginado = 5;

    // Actualizar una de las propiedades de búsqueda o paginación
    public function updating($key)
    {
        if (in_array($key, ['nombre_completo', 'cedula', 'edad', 'licencia', 'conductor_estado', 'paginado'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $conductores = VtConductor::buscadorNombres($this->nombre_completo)
        ->buscadorApellidopaterno($this->nombre_completo)
        ->buscadorApellidomaterno($this->nombre_completo)
        ->buscadorCedula($this->cedula)
        ->buscadorEdad($this->edad)
        //->buscadorLicencia($this->licencia)
        //->buscadorEstado($this->conductor_estado)
        ->paginate($this->paginado);
        return view('livewire.conductores.tabla', compact('conductores'));
    }
}
