<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model{
    protected $table = "ici_convenio";
    
    protected $fillable = [
        'id',
        'titulo',
        'descripcion',
        'contrato',
        'imagenes'       
        ];

    public $timestamps = false;
}
