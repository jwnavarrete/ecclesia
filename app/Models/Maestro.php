<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    protected $table = 'ici_maestro';

    protected $fillable = [
        'id', 'userId','nivel_estudio','especialidad','cargo_actual'
    ];

    public $timestamps = false;

}
