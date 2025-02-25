<?php

namespace App\Models\Voluntario;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Voluntario;
use Illuminate\Database\Eloquent\Model;

class GradoEstudio extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "voluntarios_grado_estudios";

    protected $primaryKey = 'idvoluntario_grado_estudios';

    protected $fillable = [
        'grado_estudios',
    ];

    // Relacion Inversa
    public function voluntarios()
    {
        return $this->hasMany(Voluntario::class);
    }
}
