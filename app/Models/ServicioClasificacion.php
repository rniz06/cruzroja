<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicioClasificacion extends Model
{
    protected $table = "servicios_clasificaciones";

    protected $primaryKey = 'id_servicio_clasificacion';

    protected $fillable = [
        'servicio_clasificacion',
    ];

    // Relacion uno a muchos inversa con la tabla de registro_movimientos
    public function registroMovimientos()
    {
        return $this->hasMany(RegistroMovimiento::class);
    }
}
