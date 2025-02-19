<?php

namespace App\Models\Voluntario;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Voluntario;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "voluntarios_estados";

    protected $primaryKey = 'id_voluntario_estado';

    protected $fillable = [
        'voluntario_estado',
    ];

    // Relacion Inversa
    public function voluntarios()
    {
        return $this->hasMany(Voluntario::class);
    }
}