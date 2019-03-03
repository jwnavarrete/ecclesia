<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Compassion_child extends Model
{
    protected $table="ici_comp_child";
    
    protected $primaryKey = 'codigo';

    protected $keyType = "string";

    protected $fillable = [
        'codigo',
        'sexo',
        'fechaNacimiento',
        'primerNombre',
        'segundoNombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'nombreComun',
        'domicilio',
        'actividades',
        'obligaciones',
        'pasatiempos',
        'enfermedades',	
        'lesiones',
        'defectohabla',
        'defectooido',
        'defectovista',
        'asisteescuela',
        'niveleducacion',
        'promedioescolar',
        'padreguardian',
        'madreguardian',
        'razonnonsiste',
        'mejormateria',
        'encargados',
        'padresjuntos',
        'padrenatural',
        'madrenatural',
        'numerohijos',
        'numerohijas',
        'hermanoscompassion',
        'detalle',
        'foto',
        'estadocivil',
        'grupo',
    ];

    public $timestamps = false;
}
