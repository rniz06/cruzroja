<?php

namespace App\Models\Conductor;

use App\Models\Conductor;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = "coductores_estados";

    protected $primaryKey = 'id_conductor_estado';

    protected $fillable = [
        'estado',
    ];

    // Relacion uno a muchos inversa con la tabla de conductores
    public function conductores()
    {
        return $this->hasMany(Conductor::class);
    }
}
