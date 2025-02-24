<?php

namespace App\Models;

use App\Models\Conductor\Estado;
use App\Models\Conductor\Licencia;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Conductor extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "conductores";

    protected $primaryKey = 'id_conductor';

    protected $fillable = [
        'voluntario_id',
        'licencia_id',
        'estado_id',
        'es_tem',
    ];

    public function voluntario(): HasOne
    {
        return $this->hasOne(Voluntario::class, 'voluntario_id');
    }

    public function licencia()
    {
        return $this->belongsTo(Licencia::class, 'licencia_id');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    // Relacion Inversa
    public function registroMovimientos()
    {
        return $this->hasMany(Movimiento::class);
    }

    protected function casts(): array
    {
        return [
            'es_tem' => 'boolean',
        ];
    }
}
