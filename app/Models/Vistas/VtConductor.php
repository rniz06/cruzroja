<?php

namespace App\Models\Vistas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VtConductor extends Model
{
    use SoftDeletes;
    
    protected $table = 'vt_conductores';

    protected $primaryKey = 'id_conductor';

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
        ->orWhere('edad', 'like', "%{$value}%")
        ->orWhere('licencia', 'like', "%{$value}%")
        ->orWhere('conductor_estado', 'like', "%{$value}%");

    }

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscadorNombres($query, $value)
    {
        $query->where('nombres', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscadorApellidopaterno($query, $value)
    {
        $query->where('apellido_paterno', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscadorApellidomaterno($query, $value)
    {
        $query->where('apellido_materno', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscadorCedula($query, $value)
    {
        $query->where('cedula', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscadorEdad($query, $value)
    {
        $query->where('edad', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscadorLicencia($query, $value)
    {
        $query->where('licencia', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscadorEstado($query, $value)
    {
        $query->where('conductor_estado', 'like', "%{$value}%");
    }

}
