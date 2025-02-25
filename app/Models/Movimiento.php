<?php

namespace App\Models;

use App\Observers\MovimientoObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([MovimientoObserver::class])]
class Movimiento extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "movimientos";

    protected $primaryKey = 'id_movimiento';

    protected $fillable = [
        'conductor_id',
        'movil_id',
        'ciudad_id',
        'servicio_id',
        'destino',
        'fecha_hora_salida',
        'km_inicial',
        'a_cargo',
        'fecha_hora_llegada',
        'km_final',
        'km_recorridos',
        'can_tripulantes',
        'observaciones',
    ];

    public function conductor()
    {
        return $this->belongsTo(Conductor::class, 'conductor_id', 'id_conductor');
    }

    public function movil()
    {
        return $this->belongsTo(Movil::class, 'movil_id', 'id_movil');
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id', 'id_ciudad');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id', 'id_servicio');
    }

    public function acargo()
    {
        return $this->belongsTo(Voluntario::class, 'a_cargo', 'id_voluntario');
    }

}
