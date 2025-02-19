<?php

namespace App\Livewire\Usuarios;

use App\Models\User;
use Livewire\WithPagination;
use App\Models\Vistas\VtUsers;
use Livewire\Component;

class Tabla extends Component
{
    // Importa el trait WithPagination para manejar la paginación de datos
    use WithPagination;

    // Define el tema de paginación como 'bootstrap'
    protected $paginationTheme = 'bootstrap';

    // Propiedades para búsqueda y filtrado en tiempo real

    public $name = '';
    public $email = '';
    public $nickname = '';
    public $created_at = '';
    public $paginado = 5;

    // Actualizar una de las propiedades de búsqueda o paginación
    public function updating($key)
    {
        if (in_array($key, ['name', 'email', 'nickname', 'created_at'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $usuarios = User::buscadorName($this->name)
        ->buscadorEmail($this->email)
        ->buscadorNickname($this->nickname)
        ->buscadorCreatedat($this->created_at)
        ->paginate($this->paginado);

        return view('livewire.usuarios.tabla', compact('usuarios'));
    }
}
