<?php

namespace App\Models\Voluntario;

use App\Models\Voluntario;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    protected $table = "voluntarios_sexo";

    protected $primaryKey = 'id_voluntario_sexo';

    protected $fillable = [
        'sexo',
    ];

    // Relacion uno a muchos inversa con la tabla de voluntarios
    public function voluntarios()
    {
        return $this->hasMany(Voluntario::class);
    }
}
