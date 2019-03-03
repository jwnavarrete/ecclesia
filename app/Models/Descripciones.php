<?php

namespace App\Models;
use App\Models\Role;
use App\Models\Iglesia;
use App\Models\Catalogo;


use Illuminate\Database\Eloquent\Model;

class Descripciones extends Model
{
    
    public function nombreIglesia($id)
    {        
        return Iglesia::select('nombre')->where('id',$id)->first();        
    }


}
