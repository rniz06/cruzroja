<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudades";

    protected $primaryKey = 'id_ciudad';

    protected $fillable = [
        'ciudad',
    ];

    // Relacion uno a muchos inversa con la tabla de barrios
    public function barrios()
    {
        return $this->hasMany(Barrio::class);
    }

    // Relacion uno a muchos inversa con la tabla de registro_movimientos
    public function registroMovimientos()
    {
        return $this->hasMany(RegistroMovimiento::class);
    }
}
