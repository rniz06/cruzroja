<?php

namespace App\Models\Movil;

use App\Models\Movil;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Combustible extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "moviles_combustibles";

    protected $primaryKey = 'id_movil_combustible';

    protected $fillable = [
        'tipo_combustible',
    ];

    // Relacion Inversa
    public function moviles()
    {
        return $this->hasMany(Movil::class);
    }
}
