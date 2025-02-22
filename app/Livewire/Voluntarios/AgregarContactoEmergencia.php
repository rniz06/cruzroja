<?php

namespace App\Livewire\Voluntarios;

use Livewire\Attributes\Validate;
use App\Models\Voluntario\ContactoEmergencia;
use App\Models\Voluntario\Parentesco;
use Livewire\Component;

class AgregarContactoEmergencia extends Component
{
    #[Validate('required')] 
    public $voluntario_id = '';

    #[Validate('required|string|max:50')] 
    public $nombre_completo = '';

    #[Validate('required')] 
    public $parentesco_id = '';

    #[Validate('required|numeric|max:15')] 
    public $telefono = '';

    public function save()
    {
        ContactoEmergencia::create([
            'voluntario_id' => $this->voluntario_id,
            'nombre_completo' => $this->nombre_completo,
            'parentesco_id' => $this->parentesco_id,
            'telefono' => $this->telefono
        ]);
 
        session()->flash('success', 'Contacto de emergencia agregado correctamente.');
 
        return $this->redirectRoute('voluntarios.show', $this->voluntario_id);
    }

    public function render()
    {
        $parentescos = Parentesco::select('id_voluntario_parentesco', 'parentesco')->get();
        return view('livewire.voluntarios.agregar-contacto-emergencia', compact('parentescos'));
    }
}
