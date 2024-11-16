<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    protected $table = "barrios";

    protected $primaryKey = 'id_barrio';

    protected $fillable = [
        'barrio',
        'ciudad_id',
    ];

    // Relacion uno a muchos con la tabla "ciudades" a travez del campo "ciudad_id"
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');
    }
}
