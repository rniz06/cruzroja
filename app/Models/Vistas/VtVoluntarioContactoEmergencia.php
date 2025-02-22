<?php

namespace App\Models\Vistas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VtVoluntarioContactoEmergencia extends Model
{
    use SoftDeletes;
    
    protected $table = 'vt_voluntarios_contactos_emergencias';

    protected $primaryKey = 'idvoluntario_contacto_emergencia';

    public $timestamps = false;
}
