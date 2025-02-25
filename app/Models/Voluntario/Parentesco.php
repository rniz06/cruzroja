<?php

namespace App\Models\Voluntario;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "voluntarios_parentescos";

    protected $primaryKey = 'id_voluntario_parentesco';

    protected $fillable = [
        'parentesco',
    ];

    public function contactosEmergencias()
    {
        return $this->hasMany(ContactoEmergencia::class);
    }
}
