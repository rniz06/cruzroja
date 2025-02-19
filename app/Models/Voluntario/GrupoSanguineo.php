<?php

namespace App\Models\Voluntario;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Voluntario;
use Illuminate\Database\Eloquent\Model;

class GrupoSanguineo extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "voluntarios_grupo_sanguineo";

    protected $primaryKey = 'idvoluntario_grupo_sanguineo';

    protected $fillable = [
        'grupo_sanguineo',
    ];
    
    // Relacion Inversa
    public function voluntarios()
    {
        return $this->hasMany(Voluntario::class);
    }
}