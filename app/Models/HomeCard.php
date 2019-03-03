<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeCard extends Model
{
    protected $table = 'ici_home_card';

    protected $fillable = [
        'id', 'titulo', 'icono','detalle','tabla','idMenu','color'
    ];

    public $timestamps = false;

}
