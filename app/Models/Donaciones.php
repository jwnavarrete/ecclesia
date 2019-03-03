<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donaciones extends Model
{
    protected $table = 'ici_donaciones';

    protected $fillable = [
        'id', 'cuenta',	'numeroCuenta',	'banco',	'enlace','imagen'
    ];

    public $timestamps = false;
}
