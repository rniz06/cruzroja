<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    protected $table = "tipo_servicios";

    protected $primaryKey = 'id_tipo_servicio';

    protected $fillable = [
        'tipo_servicio',
    ];

    /**
     * Relación de "TipoServicio" a "Guardia" (uno a muchos).
     * Una TipoServicio puede tener muchos registros en la tabla guardias.
     */
    public function guardias()
    {
        return $this->hasMany(Guardia::class);
    }
}
