<?php

namespace App\Models;

use App\Models\Guardia\ItemControl;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Guardia extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "guardias";

    protected $primaryKey = 'id_guardia';

    protected $fillable = [
        'id_usuario',
        'fecha_hora',
        'grupo',
        'servicio_id',
        'movil_id',
        'acargo_id',
        'vol_rea_rev_id',
        'km_inicial',
        'km_final',
        'carga_combustible',
        'monto',
        'observaciones'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id', 'id_servicio');
    }

    public function movil()
    {
        return $this->belongsTo(Movil::class, 'movil_id', 'id_movil');
    }

    public function acargo()
    {
        return $this->belongsTo(Voluntario::class, 'acargo_id', 'id_voluntario');
    }

    public function voluntario()
    {
        return $this->belongsTo(Voluntario::class, 'vol_rea_rev_id', 'id_voluntario');
    }

    // Relación muchos a muchos con guardias_items a través de guardia_items_controles
    public function items()
    {
        return $this->belongsToMany(ItemControl::class, 'guardias_items_controles', 'guardia_id', 'guardia_item_id')
            ->withPivot('verificacion')
            ->withTimestamps(); // Si la tabla intermedia tiene timestamps
    }

    protected $casts = [
        'fecha_hora' => 'datetime',
        'carga_combustible' => 'boolean'
    ];
}
