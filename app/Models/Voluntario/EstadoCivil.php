<?php

namespace App\Models\Voluntario;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Voluntario;
use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "voluntarios_estado_civil";

    protected $primaryKey = 'idvoluntario_estado_civil';

    protected $fillable = [
        'estado_civil',
    ];

    // Relacion Inversa
    public function voluntarios()
    {
        return $this->hasMany(Voluntario::class);
    }
}