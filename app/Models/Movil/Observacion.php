<?php

namespace App\Models\Movil;

use App\Models\Movil;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Observacion extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = 'moviles_observaciones';

    protected $primaryKey = 'id_movil_observacion';

    protected $fillable = [
        'movil_id',
        'observacion',
        'usuario_id',
    ];

    public function movil()
    {
        return $this->belongsTo(Movil::class, 'movil_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
