<?php

namespace App\Models\Vistas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VtMovil extends Model
{
    use SoftDeletes;
    
    protected $table = 'vt_moviles';

    protected $primaryKey = 'id_movil';

    public $timestamps = false;

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscador($query, $value)
    {
        $query->where('km_actual', 'like', "%{$value}%")
        ->orWhere('nro_chapa', 'like', "%{$value}%")
        ->orWhere('nro_chasis', 'like', "%{$value}%")
        ->orWhere('tipo_combustible', 'like', "%{$value}%")
        ->orWhere('movil_estado', 'like', "%{$value}%")
        ->orWhere('movil_tipo', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador km_actual.
     */
    public function scopeBuscadorKmactual($query, $value)
    {
        $query->where('km_actual', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador nro_chapa.
     */
    public function scopeBuscadorNrochapa($query, $value)
    {
        $query->where('nro_chapa', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador nro_chasis.
     */
    public function scopeBuscadorNrochasis($query, $value)
    {
        $query->where('nro_chasis', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador tipo_combustible.
     */
    public function scopeBuscadorTipocombustible($query, $value)
    {
        $query->where('tipo_combustible', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador movil_estado.
     */
    public function scopeBuscadorMovilestado($query, $value)
    {
        $query->where('movil_estado', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador movil_tipo.
     */
    public function scopeBuscadorMoviltipo($query, $value)
    {
        $query->where('movil_tipo', 'like', "%{$value}%");
    }
}
