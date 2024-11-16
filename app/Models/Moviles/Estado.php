<?php

namespace App\Models\Moviles;

use App\Models\Movil;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = "moviles_estados";

    protected $primaryKey = 'id_movil_estado';

    protected $fillable = [
        'movil_estado',
    ];

    // Relacion uno a muchos inversa con la tabla de moviles
    public function moviles()
    {
        return $this->hasMany(Movil::class);
    }
}
