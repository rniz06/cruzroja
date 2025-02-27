<?php

namespace App\Models\Guardia;

use App\Models\Guardia;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "guardias_items";

    protected $primaryKey = 'id_guardia_item';

    protected $fillable = [
        'item',
    ];

    // Relación muchos a muchos con guardias a través de guardia_items_controles
    public function guardias()
    {
        return $this->belongsToMany(Guardia::class, 'guardia_items_controles', 'guardia_item_id', 'guardia_id')
            ->withPivot('verificacion')
            ->withTimestamps(); // Si la tabla intermedia tiene timestamps
    }
}
