<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "py_departamentos";

    protected $primaryKey = 'id_departamento';

    protected $fillable = [
        'departamento',
    ];

    // Relacion Inversa
    public function voluntarioContacto()
    {
        return $this->hasMany(Voluntario::class);
    }
}