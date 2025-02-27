<?php

namespace App\Livewire\Guardias;

use App\Models\Guardia;
use Livewire\Component;
use Livewire\WithPagination;

class Tabla extends Component
{
    use WithPagination;

    public function render()
    {
        $guardias = Guardia::paginate(10);
        return view('livewire.guardias.tabla', compact('guardias'));
    }
}
