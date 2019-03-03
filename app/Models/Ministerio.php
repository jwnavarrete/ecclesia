<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ministerio extends Model
{
    protected $table = 'ici_ministerios';

    protected $fillable = [
        'titulo', 'descripcion','foto','dia','desde','hasta','orden'
    ];

    public $timestamps = false;

    public static function getMinisterios(){        
        $arrMinisterios = Ministerio::orderby('orden')->get();
                    
        $ministerioAll = [];
        $i=0;
        $grupo=0;
        foreach ($arrMinisterios as $ministerio) {
            $ministerioAll[$grupo][] = $ministerio;            
            if ($i==1){
                $grupo++;
            }
            $i++;  
        }
        return $ministerioAll;        
    }

}
