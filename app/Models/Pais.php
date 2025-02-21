<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "paises";

    protected $primaryKey = 'id_pais';

    protected $fillable = [
        'pais',
    ];

    // Relacion Inversa
    public function voluntarios()
    {
        return $this->hasMany(Voluntario::class);
    }
}