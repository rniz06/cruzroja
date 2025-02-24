<?php

namespace App\Models\Vistas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VtMovimiento extends Model
{
    use SoftDeletes;
    
    protected $table = 'vt_movimientos';

    protected $primaryKey = 'id_movimiento';

    public $timestamps = false;

    /**
     * Se implementa funcion para buscador movil.
     */
    public function scopeBuscadorMovil($query, $value)
    {
        $query->where('movil_tipo', 'like', "%{$value}%")
        ->orWhere('movil_nro_chapa', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador conductor.
     */
    public function scopeBuscadorConductor($query, $value)
    {
        $query->where('cond_cedula', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador ciudad.
     */
    public function scopeBuscadorCiudad($query, $value)
    {
        $query->where('ciudad', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador servicio.
     */
    public function scopeBuscadorServicio($query, $value)
    {
        $query->where('servicio', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador salida.
     */
    public function scopeBuscadorFechasalida($query, $value)
    {
        $query->where('fecha_hora_salida', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador acargo
     */
    public function scopeBuscadorAcargo($query, $value)
    {
        $query->where('acargo_cedula', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador recorrido.
     */
    public function scopeBuscadorKmrecorrido($query, $value)
    {
        $query->where('km_recorridos', 'like', "%{$value}%");
    }

    /**
     * Se implementa funcion para buscador tripulantes.
     */
    public function scopeBuscadorTripulantes($query, $value)
    {
        $query->where('can_tripulantes', 'like', "%{$value}%");
    }
}
