<?php

namespace App\Models\Voluntario;

use App\Models\Voluntario;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class ContactoEmergencia extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "voluntarios_contactos_emergencias";

    protected $primaryKey = 'idvoluntario_contacto_emergencia';

    protected $fillable = [
        'voluntario_id',
        'nombre_completo',
        'telefono',
        'parentesco_id',
    ];

    public function voluntario()
    {
        return $this->belongsTo(Voluntario::class, 'voluntario_id');
    }

    public function parentesco()
    {
        return $this->belongsTo(Parentesco::class, 'parentesco_id');
    }
}
