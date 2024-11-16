<?php

namespace App\Models\Conductor;

use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    protected $table = "conductores_licencias";

    protected $primaryKey = 'id_conductor_licencia';

    protected $fillable = [
        'clase',
    ];
}
