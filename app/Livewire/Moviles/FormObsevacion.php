<?php

namespace App\Livewire\Moviles;

use App\Models\Movil\Observacion;
use Livewire\Component;

class FormObsevacion extends Component
{
    public $movil_id;
    public $observacion;

    protected $rules = [
        'observacion' => 'required|min:5',
    ];

    public function save()
    {
        $this->validate();

        Observacion::create([
            'movil_id' => $this->movil_id,
            'observacion' => $this->observacion,
            'usuario_id' => auth()->id(),
        ]);

        session()->flash('success', 'Observación agregada correctamente.');
 
        return $this->redirectRoute('moviles.show', $this->movil_id);
    }

    public function render()
    {
        return view('livewire.moviles.form-obsevacion');
    }
}
