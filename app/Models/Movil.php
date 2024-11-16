<?php

namespace App\Models;

use App\Models\Moviles\Combustible as MovilCombustible;
use App\Models\Moviles\Estado as MovilEstado;
use App\Models\Moviles\Tipo as MovilTipo;
use Illuminate\Database\Eloquent\Model;

class Movil extends Model
{
    protected $table = "moviles";

    protected $primaryKey = 'id_movil';

    protected $fillable = [
        'movil_combustible_id',
        'movil_estado_id',
        'movil_tipo_id',
        'km_actual',
    ];

    // Relacion uno a muchos con la tabla "moviles_combustibles" a travez del campo "movil_combustible_id"
    public function combustible()
    {
        return $this->belongsTo(MovilCombustible::class, 'movil_combustible_id');
    }

    // Relacion uno a muchos con la tabla "moviles_estados" a travez del campo "movil_estado_id"
    public function estado()
    {
        return $this->belongsTo(MovilEstado::class, 'movil_estado_id');
    }

    // Relacion uno a muchos con la tabla "moviles_tipos" a travez del campo "movil_tipo_id"
    public function tipo()
    {
        return $this->belongsTo(MovilTipo::class, 'movil_tipo_id');
    }

    // Relacion uno a muchos inversa con la tabla de registro_movimientos
    public function registroMovimientos()
    {
        return $this->hasMany(RegistroMovimiento::class);
    }
}
