<?php

namespace App\Models\Guardia;

use App\Models\Guardia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemControl extends Model
{
    protected $table = "guardias_items_controles";

    protected $primaryKey = 'id_guardia_item_control';

    protected $fillable = [
        'guardia_id',
        'guardia_item_id',
        'verificacion',
    ];

    public function guardia(): BelongsTo
    {
        return $this->belongsTo(Guardia::class, 'guardia_id');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'guardia_item_id');
    }
}
