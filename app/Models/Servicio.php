<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "servicios";

    protected $primaryKey = 'id_servicio';

    protected $fillable = [
        'servicio',
        'descripcion',
    ];

    public function registroMovimientos()
    {
        return $this->hasMany(Movimiento::class, 'servicio_id', 'id_servicio');
    }

    public function guardias()
    {
        return $this->hasMany(Guardia::class, 'servicio_id', 'id_servicio');
    }
}
