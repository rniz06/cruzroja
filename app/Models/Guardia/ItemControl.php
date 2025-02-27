<?php

namespace App\Models\Guardia;

use App\Models\Guardia;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class ItemControl extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "guardias_items_controles";

    protected $primaryKey = 'id_guardia_item_control';

    protected $fillable = [
        'guardia_id',
        'guardia_item_id',
        'verificacion',
    ];

}