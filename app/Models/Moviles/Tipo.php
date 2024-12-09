<?php

namespace App\Models\Moviles;

use App\Models\Movil;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = "moviles_tipos";

    protected $primaryKey = 'id_movil_tipo';

    protected $fillable = [
        'movil_tipo',
    ];

    // Relacion uno a muchos inversa con la tabla de moviles
    public function moviles()
    {
        return $this->hasMany(Movil::class);
    }
}
