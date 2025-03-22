<?php

namespace App\Models\Vistas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VtMovilObservacion extends Model
{
    //use SoftDeletes;
    
    protected $table = 'vt_moviles_observaciones';

    protected $primaryKey = 'id_movil_observacion';

    public $timestamps = false;
}
