<?php

namespace App\Models\Vistas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VtVoluntario extends Model
{
    use SoftDeletes;
    
    protected $table = 'vt_voluntarios';

    protected $primaryKey = 'id_voluntario';

    public $timestamps = false;

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscador($query, $value)
    {
        $query->where('nombres', 'like', "%{$value}%")
        ->orWhere('apellido_paterno', 'like', "%{$value}%")
        ->orWhere('apellido_materno', 'like', "%{$value}%")
        ->orWhere('cedula', 'like', "%{$value}%")
        ->orWhere('fecha_nacimiento', 'like', "%{$value}%")
        ->orWhere('edad', 'like', "%{$value}%")
        ->orWhere('lugar_nacimiento', 'like', "%{$value}%")
        ->orWhere('nacionalidad', 'like', "%{$value}%")
        ->orWhere('sexo', 'like', "%{$value}%")
        ->orWhere('estado_civil', 'like', "%{$value}%")
        ->orWhere('grupo_sanguineo', 'like', "%{$value}%")
        ->orWhere('voluntario_estado', 'like', "%{$value}%");

    }

    public function scopeBuscadorNombres($query, $value)
    {
        $query->where('nombres', 'like', "%{$value}%");
    }

    public function scopeBuscadorApellidopaterno($query, $value)
    {
        $query->where('apellido_paterno', 'like', "%{$value}%");
    }

    public function scopeBuscadorApellidomaterno($query, $value)
    {
        $query->where('apellido_aterno', 'like', "%{$value}%");
    }

    public function scopeBuscadorCedula($query, $value)
    {
        $query->where('cedula', 'like', "%{$value}%");
    }

    public function scopeBuscadorFechanacimiento($query, $value)
    {
        $query->where('fecha_nacimiento', 'like', "%{$value}%");
    }

    public function scopeBuscadorEdad($query, $value)
    {
        $query->where('edad', 'like', "%{$value}%");
    }

    public function scopeBuscadorLugarnacimiento($query, $value)
    {
        $query->where('lugar_nacimiento', 'like', "%{$value}%");
    }

    public function scopeBuscadorNacionalidad($query, $value)
    {
        $query->where('nacionalidad', 'like', "%{$value}%");
    }

    public function scopeBuscadorSexo($query, $value)
    {
        $query->where('sexo', 'like', "%{$value}%");
    }

    public function scopeBuscadorEstadocivil($query, $value)
    {
        $query->where('edad', 'like', "%{$value}%");
    }

    public function scopeBuscadorGruposanguineo($query, $value)
    {
        $query->where('grupo_sanguineo', 'like', "%{$value}%");
    }

    public function scopeBuscadorEstado($query, $value)
    {
        $query->where('voluntario_estado', 'like', "%{$value}%");
    }
}