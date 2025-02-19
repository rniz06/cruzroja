<?php

namespace App\Models\Voluntario;

use App\Models\Ciudad;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "voluntarios_contactos";

    protected $primaryKey = 'id_voluntario_contacto';

    protected $fillable = [
        'voluntario_id',
        'direccion',
        'departamento_id',
        'ciudad_id',
        'correo_electronico',
        'tel_particular',
        'tel_trabajo',
        'celular',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');
    }
}