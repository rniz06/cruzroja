<?php

namespace App\Livewire\Movimientos;

use App\Models\Vistas\VtMovimiento;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;
    
    public $movil;
    public $conductor;
    public $ciudad;
    public $servicio;
    public $salida;
    public $acargo;
    public $recorrido;
    public $tripulantes;
    public $paginado = 5;

    // Actualizar una de las propiedades de búsqueda o paginación
    public function updating($key)
    {
        if (in_array($key, ['movil', 'conductor', 'ciudad', 'servicio', 'salida', 'acargo', 'recorrido', 'tripulantes', 'paginado'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $movimientos = VtMovimiento::buscadorMovil($this->movil)
            ->buscadorConductor($this->conductor)
            ->buscadorCiudad($this->ciudad)
            ->buscadorServicio($this->servicio)
            ->buscadorFechasalida($this->salida)
            ->buscadorAcargo($this->acargo)
            ->buscadorKmrecorrido($this->recorrido)
            ->buscadorTripulantes($this->tripulantes)
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginado);
        return view('livewire.movimientos.tabla', compact('movimientos'));
    }
}
