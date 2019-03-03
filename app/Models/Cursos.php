<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\usuario_x_curso;

class Cursos extends Model
{
    protected $table="ici_cursos";

	protected $fillable = [
        'id', 'titulo',	'maestro',	'detalle',	'fec_inicio',	'fec_fin',	'capacidad',	'estado',	'foto'
    ];

    public function allCursos(){
        return $this->where('estado', 1)
            ->orderby('id')
            ->orderby('titulo')            
            ->get();     
    }

    public static function getLimiteCurso($id){
        return usuario_x_curso::where('cursoId',$id)->count();  
    } 

    public function getAlumnosCurso($id){
        $cursos = DB::table('ici_usuario_x_curso as a')
            ->leftJoin('ici_users as b', 'a.usuarioId', '=','b.id')->where('a.cursoId',$id)
            ->select('*')->get()->toArray();    

        return $cursos;
        return usuario_x_curso::where('cursoId', $id)                        
            ->get();     
    } 
    

    public static function getCursos(){
        $cursos = new Cursos();
        $arrCursos = $cursos->allCursos();
        $cursoAll = [];
        $i=0;
        $grupo=0;
        foreach ($arrCursos as $curso) {
            $cursoAll[$grupo][] = $curso;            
            if ($i==2){
                $grupo++;
            }
            $i++;  
        }
        return $cursoAll;        
    }



}
