<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'ici_About';
    
    protected $fillable = [
        'name', 'titulo','enlace','panel',	'descripcion',	'foto',	'orden'
    ];

    public $timestamps = false;

    
}
