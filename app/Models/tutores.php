<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tutores extends Model
{
    //
    protected $table = 'ici_tutores';

    protected $primaryKey = 'cedula';
    protected $keyType = "string";
    
    protected $fillable = [
        'cedula',
        'nombres',
        'apellidos',
        'sexo',
        'telefono',
        'fechaNacimiento',
        'foto',
        ];

    public $timestamps = false;


}
