<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compassion_Grupos extends Model
{
    protected $table = "ici_comp_grupos";
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'edad_minima',
        'edad_maxima',
        'capacidad',        
        ];

    public $timestamps = false;
}
