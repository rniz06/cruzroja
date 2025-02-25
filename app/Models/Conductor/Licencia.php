<?php

namespace App\Models\Conductor;

use App\Models\Conductor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Licencia extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "conductores_licencias";

    protected $primaryKey = 'id_conductor_licencia';

    protected $fillable = [
        'licencia',
    ];

    // Relacion Inversa
    public function conductores()
    {
        return $this->hasMany(Conductor::class);
    }
}
