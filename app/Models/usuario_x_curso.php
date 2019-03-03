<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuario_x_curso extends Model
{
    protected $table = 'ici_usuario_x_curso';      

    public $timestamps = false;

	protected $fillable = [
        'cursoId', 'usuarioId',	'asistencia',	'fec_registro',	'usuario_registro'
    ];

}
