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
        'fecha_nacimiento',
        'primer_nombre',
        'segundo_nombre',
        'apellido_paterno',
        'apellido_materno',
        'nombre_comun',
        'domicilio',
        'otras_actividades',
        'otras_obligaciones',
        'instrumentos_musicales',
        'otros_pasatiempos',
        'otra_enfermedad',        
        'columna',
        'pie_izquierdo',
        'pie_derecho',
        'mano_izquierda',
        'mano_derecha',
        'pierna_izquierda',
        'pierna_derecha',
        'brazo_izquierdo',
        'brazo_derecho',
        'habla',
        'oido_izquierdo',
        'oido_derecho',
        'ojo_izquierdo',
        'ojo_derecho',
        'asiste_escuela',
        'razon_no_asiste',
        'nivel_educacion',
        'promedio_escolar',
        'mejor_materia',
        'padres_juntos',
        'estado_civil',
        'padre_guardian',
        'madre_guardian',
        'numero_hijos',
        'numero_hijas',
        'hermanos_compassion',
        'detalle',
        'grupo',                
    ];

    public $timestamps = false;
}
