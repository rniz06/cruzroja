<?php

namespace App\Models\Voluntario;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Voluntario;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "voluntarios_sexo";

    protected $primaryKey = 'id_voluntario_sexo';

    protected $fillable = [
        'sexo',
    ];

    // Relacion Inversa
    public function voluntarios()
    {
        return $this->hasMany(Voluntario::class);
    }
}