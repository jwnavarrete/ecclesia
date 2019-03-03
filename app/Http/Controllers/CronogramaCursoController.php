<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cronograma_curso;
use App\Models\Cursos;
use App\Models\usuario_x_curso;
use Exception;
use DB;

class CronogramaCursoController extends Controller
{
    public function __construct(){
        //$this->middleware('auth:all');
    }

    public function index(){     
        return view('pages.cursos.asistencia.index');
    }

    public function getCronograma(){     
        $calendar = array();
        $calendar = Cronograma_curso::all();      
        
        foreach($calendar as $key => $rows){        	
        	$titulo = cursos::where('id', $rows['curso'])->first()->titulo;

            $start = strtotime($rows['start_date']) * 1000;
            $end = strtotime($rows['end_date']) * 1000;
            
            $calendar[] = array(
            'id' =>$rows['id'],
            'title' => $titulo .' '. $rows['title'],
            'url' => $rows['url'],
            "class" => 'event-important',
            'start' => $start,
            'end' => $end,            
            );
        }
        
        $calendarData = array(
            "success" => 1,
            "result"=>$calendar
        );        
        return response()->json($calendar);        
    }

    public function asistencia(Request $request ){   
        $arrCrono = Cronograma_curso::where('id','=', $request->idCrono)->first();
        $arrCurso = cursos::where('id', $arrCrono->curso)->first();
        
        $arrUsuarios = DB::table('ici_usuario_x_curso as a')
                        ->join('ici_users as b', 'a.usuarioId', '=','b.id')
                        ->where('cursoId', '=', $arrCrono->curso)->get();            
                

        return view('pages.cursos.asistencia.asistencia', [
            'curso' => $arrCurso, 
            'usuarios' => $arrUsuarios,
            'cronograma' => $arrCrono            
        ]);
    }

    public function saveAsistencia(Request $request ){           
        try{                        
                        
            
            Cronograma_curso::updateOrCreate(['id' => $request->idCrono], ['comentario' => $request->comentario]);

            DB::table('ici_asistencia_cursos')
                ->where('idCrono','=',$request->idCrono)                
                ->delete();    

            if (is_array($request->asistencia)) {
                foreach ($request->asistencia as $key => $data) {                    
                    DB::table('ici_asistencia_cursos')->insert($data);
                }
            }            

            return response()->json(["message" => "Realizado con exito!" ,"estado"=>0]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }          
    }

    public function getAsistencia(Request $request){        
        try{                                                
            $arrData = DB::table('ici_asistencia_cursos')
                        ->where('idCrono','=',$request->idCrono)                
                        ->get();    
        
            return response()->json(["message" => "Realizado con exito!" ,"estado"=>0, "data" =>$arrData]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }          
    }
    

}
