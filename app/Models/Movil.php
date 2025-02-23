<?php

namespace App\Models;

use App\Models\Movil\Combustible;
use App\Models\Movil\Estado;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Movil extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "moviles";

    protected $primaryKey = 'id_movil';

    protected $fillable = [
        'combustible_id',
        'estado_id',
        'tipo_id',
        'km_actual',
        'nro_chapa',
        'nro_chasis',
    ];

    // Relacion Inversa
    public function combustible()
    {
        return $this->belongsTo(Combustible::class, 'combustible_id');
    }

    // Relacion Inversa
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    // Relacion Inversa
    public function tipo()
    {
        return $this->belongsTo(Movil\Tipo::class, 'tipo_id');
    }
}
