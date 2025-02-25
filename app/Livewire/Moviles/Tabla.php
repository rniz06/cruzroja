<?php

namespace App\Livewire\Moviles;

use App\Models\Vistas\VtMovil;
use Livewire\Component;

class Tabla extends Component
{
    public $movil_tipo;
    public $nro_chapa;
    public $nro_chasis;
    public $km_actual;
    public $tipo_combustible;
    public $movil_estado;
    public $paginado = 5;

    // Actualizar una de las propiedades de búsqueda o paginación
    public function updating($key)
    {
        if (in_array($key, ['movil_tipo', 'nro_chapa', 'nro_chasis', 'km_actual', 'tipo_combustible', 'movil_estado', 'paginado'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $moviles = VtMovil::buscadorMoviltipo($this->movil_tipo)
        ->buscadorNrochapa($this->nro_chapa)
        ->buscadorNrochasis($this->nro_chasis)
        ->buscadorKmactual($this->km_actual)
        ->buscadorTipocombustible($this->tipo_combustible)
        ->buscadorMovilestado($this->movil_estado)
        ->paginate($this->paginado);
        return view('livewire.moviles.tabla', compact('moviles'));
    }
}
