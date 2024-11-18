<?php

namespace App\Models;

use App\Observers\RegistroMovimientoObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([RegistroMovimientoObserver::class])]
class RegistroMovimiento extends Model
{
    protected $table = "registro_movimientos";

    protected $primaryKey = 'id_registro_movimiento';

    protected $fillable = [
        'conductor_id',
        'movil_id',
        'ciudad_id',
        'servicio_id',
        'clasificacion_servicio_id',
        'usuario_id',
        'fecha_hora_salida',
        'km_inicial',
        'destino',
        'a_cargo',
        'fecha_hora_llegada',
        'km_final',
        'km_recorrido',
        'observaciones',
    ];

    // Relacion uno a muchos con la tabla "conductores" a travez del campo "conductor_id"
    public function conductor()
    {
        return $this->belongsTo(Conductor::class, 'conductor_id');
    }

    // Relacion uno a muchos con la tabla "moviles" a travez del campo "movil_id"
    public function movil()
    {
        return $this->belongsTo(Movil::class, 'movil_id');
    }

    // Relacion uno a muchos con la tabla "ciudades" a travez del campo "ciudad_id"
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');
    }

    // Relacion uno a muchos con la tabla "servicios" a travez del campo "servicio_id"
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

    // Relacion uno a muchos con la tabla "servicios_clasificaciones" a travez del campo "clasificacion_servicio_id"
    public function servicioClasificacion()
    {
        return $this->belongsTo(ServicioClasificacion::class, 'clasificacion_servicio_id');
    }

    // Relacion uno a muchos con la tabla "users" a travez del campo "usuario_id"
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
