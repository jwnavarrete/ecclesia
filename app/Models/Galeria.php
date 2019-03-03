<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model{
    
    protected $table = 'ici_galeria';

    protected $fillable = [
        'id', 'tipo',	'archivo',	'ruta'
    ];

    public $timestamps = false;


}
