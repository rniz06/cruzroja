<?php

namespace App\Models\Movil;

use App\Models\Movil;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "moviles_tipos";

    protected $primaryKey = 'id_movil_tipo';

    protected $fillable = [
        'movil_tipo',
    ];

    // Relacion Inversa
    public function moviles()
    {
        return $this->hasMany(Movil::class);
    }
}
