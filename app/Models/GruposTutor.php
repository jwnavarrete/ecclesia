<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GruposTutor extends Model
{
    protected $table="ici_comp_grupos_tutores";

    protected $primaryKey = ['idGrupo', 'idTutor'];

    //protected $keyType = "string";

	protected $fillable = [
        'idGrupo', 'idTutor'
    ];

}
