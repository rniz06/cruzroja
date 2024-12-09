<?php

namespace App\Models\Moviles;

use App\Models\Movil;
use Illuminate\Database\Eloquent\Model;

class Combustible extends Model
{
    protected $table = "moviles_combustibles";

    protected $primaryKey = 'id_movil_combustible';

    protected $fillable = [
        'tipo_combustible',
    ];

    // Relacion uno a muchos inversa con la tabla de moviles
    public function moviles()
    {
        return $this->hasMany(Movil::class);
    }
}
