<?php

namespace App\Models;

use App\Models\Conductor\Estado as ConductorEstado;
use App\Models\Conductor\Licencia as ConductorLicencia;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $table = "conductores";

    protected $primaryKey = 'id_conductor';

    protected $fillable = [
        'nombres',
        'apellidos',
        'nombre_completo',
        'ci_conductor',
        'conductor_estado_id',
        'conductor_licencia_id',
    ];

    // Relacion uno a muchos con la tabla "conductores_estados" a travez del campo "conductor_estado_id"
    public function estado()
    {
        return $this->belongsTo(ConductorEstado::class, 'conductor_estado_id');
    }

    // Relacion uno a muchos con la tabla "conductores_licencias" a travez del campo "conductor_licencia_id"
    public function licencia()
    {
        return $this->belongsTo(ConductorLicencia::class, 'conductor_licencia_id');
    }

    // Relacion uno a muchos inversa con la tabla de registro_movimientos
    public function registroMovimientos()
    {
        return $this->hasMany(RegistroMovimiento::class);
    }

}
