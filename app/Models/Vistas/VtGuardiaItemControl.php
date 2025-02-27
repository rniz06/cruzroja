<?php

namespace App\Models\Vistas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VtGuardiaItemControl extends Model
{
    use SoftDeletes;
    
    protected $table = 'vt_guardias_items_controles';

    protected $primaryKey = 'id_guardia_item_control';

    public $timestamps = false;
}
