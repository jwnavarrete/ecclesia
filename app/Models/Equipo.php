<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Equipo extends Model
{

    protected $table = 'ici_Equipo';

    protected $fillable = [
        'nombre', 'cargo',	'descripcion',	'foto',	'orden'
    ];

    public $timestamps = false;


    public function allEquipo(){
        return $this->orderby('orden')->get();     
    }


    public static function getEquipos(){
        $objEquipo = new Equipo();
        $arrEquipo = $objEquipo->allEquipo();
        $equipoAll = [];
        $i=0;
        $grupo=0;
        foreach ($arrEquipo as $equipo) {
            $equipoAll[$grupo][] = $equipo;            
            if ($i==2){
                $grupo++;
            }
            $i++;  
        }
        return $equipoAll;        
    }



}
