<?php

namespace App\Models;

use App\Models\Voluntario\Estado;
use App\Models\Voluntario\Sexo;
use Illuminate\Database\Eloquent\Model;

class Voluntario extends Model
{
    protected $table = "voluntarios";

    protected $primaryKey = 'id_voluntario';

    protected $fillable = [
        'nombre_completo',
        'ci',
        'direccion',
        'telefono',
        'ciudad_id',
        'estado_id',
        'sexo_id',
        'es_tem',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'es_tem' => 'boolean',
        ];
    }

    // Relacion uno a muchos con la tabla "ciudades" a travez del campo "ciudad_id"
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');
    }

    // Relacion uno a muchos con la tabla "voluntarios_estados" a travez del campo "estado_id"
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    // Relacion uno a muchos con la tabla "voluntarios_sexo" a travez del campo "sexo_id"
    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'sexo_id');
    }
}
