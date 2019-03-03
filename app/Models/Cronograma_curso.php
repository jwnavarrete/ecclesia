<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cronograma_curso extends Model
{
    protected $table = "ici_cronograma_cursos";
    
    protected $fillable = [
        'id',
        'title',
        'description',
        'start_date',
        'end_date',
        'created',
        'url',
        'comentario',
        'curso',
        ];

    public $timestamps = false;
}
