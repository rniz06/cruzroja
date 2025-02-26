<?php

namespace App\Models;

use App\Models\Voluntario\ContactoEmergencia;
use App\Models\Voluntario\Estado;
use App\Models\Voluntario\EstadoCivil;
use App\Models\Voluntario\GrupoSanguineo;
use App\Models\Voluntario\Sexo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Voluntario extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "voluntarios";

    protected $primaryKey = 'id_voluntario';

    protected $fillable = [
        'filial_id',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'cedula',
        'fecha_nacimiento',
        'edad',
        'lugar_nacimiento_id',
        'nacionalidad_id',
        'sexo_id',
        'estado_civil_id',
        'grupo_sanguineo_id',
        'estado_id',
        'grado_estudio_id',
        'profesion_id',
    ];

    public function lugarNacimiento()
    {
        return $this->belongsTo(Ciudad::class, 'lugar_nacimiento_id');
    }

    public function nacionalidad()
    {
        return $this->belongsTo(Pais::class, 'nacionalidad_id');
    }

    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'sexo_id');
    }

    public function estadoCivil()
    {
        return $this->belongsTo(EstadoCivil::class, 'estado_civil_id');
    }

    public function grupoSanguineo()
    {
        return $this->belongsTo(GrupoSanguineo::class, 'grupo_sanguineo_id');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function gradoEstudio()
    {
        return $this->belongsTo(Estado::class, 'grado_estudio_id');
    }

    public function profesion()
    {
        return $this->belongsTo(Estado::class, 'profesion_id');
    }

    public function contactosEmergencias()
    {
        return $this->hasMany(ContactoEmergencia::class);
    }

    // Relacion Inversa
    public function registroMovimientos()
    {
        return $this->hasMany(Movimiento::class);
    }

    public function registroGuardias()
    {
        return $this->hasMany(Guardia::class);
    }


    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscador($query, $value)
    {
        $query->where('nombres', 'like', "%{$value}%")
        ->orWhere('apellido_paterno', 'like', "%{$value}%")
        ->orWhere('apellido_materno', 'like', "%{$value}%")
        ->orWhere('cedula', 'like', "%{$value}%")
        ->orWhere('fecha_nacimiento', 'like', "%{$value}%")
        ->orWhere('edad', 'like', "%{$value}%");
    }
}