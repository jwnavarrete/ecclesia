<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class horarios extends Model
{    
    protected $table = 'ici_horarios';

    protected $fillable = [
        'id', 'dia', 'titulo','lugar','horario','comentario'
    ];

    public $timestamps = false;
}
