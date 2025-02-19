<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Barrio extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = "py_barrios";

    protected $primaryKey = 'id_barrio';

    protected $fillable = [
        'barrio',
        'ciudad_id',
    ];
}