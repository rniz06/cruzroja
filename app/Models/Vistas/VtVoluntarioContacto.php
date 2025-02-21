<?php

namespace App\Models\Vistas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VtVoluntarioContacto extends Model
{
    use SoftDeletes;
    
    protected $table = 'vt_voluntarios_contactos';

    protected $primaryKey = 'id_voluntario_contacto';

    public $timestamps = false;
}
