<?php

namespace App\Models\Vistas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VtGuardia extends Model
{
    use SoftDeletes;
    
    protected $table = 'vt_guardias';

    protected $primaryKey = 'id_guardia';

    public $timestamps = false;

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscador($query, $value)
    {
        $query->where('fecha_hora', 'like', "%{$value}%")
        ->orWhere('grupo', 'like', "%{$value}%")
        ->orWhere('servicio', 'like', "%{$value}%")
        ->orWhere('movil_tipo', 'like', "%{$value}%")
        ->orWhere('nro_chapa', 'like', "%{$value}%")
        ->orWhere('acargo_cedula', 'like', "%{$value}%")
        ->orWhere('vol_rea_rev_cedula', 'like', "%{$value}%")
        ->orWhere('km_inicial', 'like', "%{$value}%")
        ->orWhere('km_final', 'like', "%{$value}%")
        ->orWhere('carga_combustible', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador fecha_hora.
     */
    public function scopeBuscadorFechahora($query, $value)
    {
        $query->where('fecha_hora', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador grupo.
     */
    public function scopeBuscadorGrupo($query, $value)
    {
        $query->where('grupo', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador servicio.
     */
    public function scopeBuscadorServicio($query, $value)
    {
        $query->where('servicio', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador movil_tipo.
     */
    public function scopeBuscadorMoviltipo($query, $value)
    {
        $query->where('movil_tipo', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador nro_chapa.
     */
    public function scopeBuscadorNrochapa($query, $value)
    {
        $query->where('nro_chapa', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador acargo_cedula.
     */
    public function scopeBuscadorAcargocedula($query, $value)
    {
        $query->where('acargo_cedula', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador vol_rea_rev_cedula.
     */
    public function scopeBuscadorVolrearevcedula($query, $value)
    {
        $query->where('vol_rea_rev_cedula', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador km_inicial.
     */
    public function scopeBuscadorKminicial($query, $value)
    {
        $query->where('km_inicial', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador km_final.
     */
    public function scopeBuscadorKmfinal($query, $value)
    {
        $query->where('km_final', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador carga_combustible.
     */
    public function scopeBuscadorCargacombustible($query, $value)
    {
        $query->where('carga_combustible', 'like', "%{$value}%");
    }
}
