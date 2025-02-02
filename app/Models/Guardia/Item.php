<?php

namespace App\Models\Guardia;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $table = "guardias_items";

    protected $primaryKey = 'id_guardia_item';

    protected $fillable = [
        'item',
    ];

    public function controles(): HasMany
    {
        return $this->hasMany(ItemControl::class, 'guardia_item_id');
    }
}
