<?php

namespace App\Models\Conductor;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Conductor;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "conductores_estados";

    protected $primaryKey = 'id_conductor_estado';

    protected $fillable = [
        'conductor_estado',
    ];

    // Relacion Inversa
    public function conductores()
    {
        return $this->hasMany(Conductor::class);
    }
}
