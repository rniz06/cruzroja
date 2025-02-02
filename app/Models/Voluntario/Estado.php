<?php

namespace App\Models\Voluntario;

use App\Models\Voluntario;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = "voluntarios_estados";

    protected $primaryKey = 'id_voluntario_estado';

    protected $fillable = [
        'estado',
    ];

    // Relacion uno a muchos inversa con la tabla de voluntarios
    public function voluntarios()
    {
        return $this->hasMany(Voluntario::class);
    }
}
