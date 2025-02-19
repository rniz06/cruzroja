<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "py_ciudades";

    protected $primaryKey = 'id_ciudad';

    protected $fillable = [
        'ciudad',
        'departamento_id',
    ];

    // Relacion Inversa
    public function voluntarioLugarNacimiento()
    {
        return $this->hasMany(Voluntario::class);
    }

    // Relacion Inversa
    public function voluntarioContacto()
    {
        return $this->hasMany(Voluntario::class);
    }
}