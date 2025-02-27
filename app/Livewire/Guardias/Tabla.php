<?php

namespace App\Livewire\Guardias;

use App\Models\Guardia;
use App\Models\Vistas\VtGuardia;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $fecha_hora = "";
    public $grupo = "";
    public $servicio = "";
    public $movil = "";
    public $acargo = "";
    public $revision = "";
    public $km_inicial = "";
    public $km_final = "";
    public $carga_combustible = "";
    public $paginado = 5;

    // Actualizar una de las propiedades de búsqueda o paginación
    public function updating($key)
    {
        if (in_array($key, ['fecha_hora', 'grupo', 'servicio', 'movil', 'acargo', 'revision', 'km_inicial', 'km_final', 'carga_combustible', 'paginado'])) {
            $this->resetPage();
        }
    }


    public function render()
    {
        $guardias = VtGuardia::buscadorFechahora($this->fecha_hora)
            ->buscadorGrupo($this->grupo)
            ->buscadorServicio($this->servicio)
            ->buscadorMoviltipo($this->movil)
            ->buscadorNrochapa($this->movil)
            ->buscadorAcargocedula($this->acargo)
            ->buscadorVolrearevcedula($this->revision)
            ->buscadorKmInicial($this->km_inicial)
            ->buscadorKmFinal($this->km_final)
            ->buscadorCargaCombustible($this->carga_combustible)
            ->orderBy('fecha_hora', 'desc')
            ->paginate($this->paginado);
        return view('livewire.guardias.tabla', compact('guardias'));
    }
}
