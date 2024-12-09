<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = "servicios";

    protected $primaryKey = 'id_servicio';

    protected $fillable = [
        'servicio',
        'servicio_descripcion',
    ];

    // Relacion uno a muchos inversa con la tabla de registro_movimientos
    public function registroMovimientos()
    {
        return $this->hasMany(RegistroMovimiento::class);
    }
}
