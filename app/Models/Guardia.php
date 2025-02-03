<?php

namespace App\Models;

use App\Models\Guardia\ItemControl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guardia extends Model
{
    protected $table = "guardias";

    protected $primaryKey = 'id_guardia';

    protected $fillable = [
        'fecha_hora',
        'grupo',
        'tipo_servicio_id',
        'tipo_servicio_aclaracion',
        'movil_id',
        'a_cargo_id',
        'vol_rea_rev_id',
        'km_inicial',
        'km_final',
        'carga_combustible',
        'monto',
        'observaciones'
    ];

    protected $casts = [
        'fecha_hora' => 'datetime',
        'carga_combustible' => 'boolean'
    ];


    // Para el recurso Guardia De Filament
    protected static function booted()
    {
        static::saved(function ($guardia) {
            if (request()->has('itemControles')) {
                foreach (request()->input('itemControles') as $itemId => $data) {
                    $guardia->itemControles()->updateOrCreate(
                        ['guardia_item_id' => $itemId],
                        ['verificacion' => $data['verificacion']]
                    );
                }
            }
        });
    }

    public function itemControles(): HasMany
    {
        return $this->hasMany(ItemControl::class, 'guardia_id');
    }

    /**
     * Relación de "TipoServicio" a "Guardia" (uno a muchos inverso).
     * Cada Guardia pertenece a una TipoServicio.
     */
    public function tipoServicio()
    {
        return $this->belongsTo(TipoServicio::class, 'tipo_servicio_id');
    }

    /**
     * Relación de "Movil" a "Guardia" (uno a muchos inverso).
     * Cada Guardia pertenece a un Movil.
     */
    public function movil()
    {
        return $this->belongsTo(Movil::class, 'movil_id');
    }

    /**
     * Relación de "Voluntario" a "Guardia" (uno a muchos inverso).
     * Cada Guardia pertenece a un aCargo(Voluntario).
     */
    public function aCargo()
    {
        return $this->belongsTo(Voluntario::class, 'a_cargo_id');
    }

    /**
     * Relación de "Voluntario" a "Guardia" (uno a muchos inverso).
     * Cada Guardia pertenece a un VoluntarioRevision(Voluntario).
     */
    public function VoluntarioRevision()
    {
        return $this->belongsTo(Voluntario::class, 'vol_rea_rev_id');
    }
}
