<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tutores;
use App\Models\GruposTutor;

use DB;


class TutoresController extends Controller
{
    public function __construct(){
        $this->middleware('auth:all');
    }

    public function index(){     
        return view('pages.compassion.Tutores.index');
    }

    
    public function listarTutores(Request $request){
        try{
            
            if ($request->filtro == "T"){
                $arrTutores = tutores::all()->toArray();            
            }else{                
                $arrTutores = tutores::where('sexo','=',$request->filtro)->get();                            
            }
            
            return response()->json(["message" => "" ,"estado"=>0,"data"=>$arrTutores]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }                
    }
    
    
    public function listaGrupoTutor(Request $request){
        try{
            
            $arrGrupos = array();
            
            $arrGrupos = DB::table('ici_comp_grupos_tutores as a')
            ->leftJoin('ici_comp_grupos as b', 'b.id', '=','a.idGrupo')
            ->select('b.*',DB::raw('CONCAT(a.idTutor,"-",a.idGrupo) AS codigo')) 
            ->where('idTutor','=',$request->tutor)->get();                                        
            
            return response()->json(["message" => "" ,"estado"=>0,"data"=>$arrGrupos]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }                
    }

    
    //
    
    public function getTutor(Request $request)
    {
        try{                        
            $Childs = tutores::get()->where('cedula','=', $request->codigo)->first();            
            $Childs->fechaNacimiento = date('d/m/Y', strtotime($Childs->fechaNacimiento));

            return response()->json(["message" => "" ,"estado"=>0,"data"=>$Childs]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }  
    }
    

    public function deleteTutor(Request $request)
    {
        try{
            tutores::get()->where('codigo','=', $request->cedula)->first()->delete();                        
            
            return response()->json(["message" => "Eliminado con exito!" ,"estado"=>0]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }  
    }

    
    public function deleteGrupoTutor(Request $request)
    {
        try{
//            GruposTutor::get()->where('idTutor','=', $request->tutor)->first()->delete();                        

            GruposTutor::get()
            ->where('idTutor','=', $request->tutor)
            ->where('idGrupo','=', $request->grupo)
            ->first()
            ->delete();                        

            return response()->json(["message" => "Eliminado con exito!" ,"estado"=>0]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }  
    }

    

    public function crud(Request $request){
        try{
            $arrDatos = json_decode($request->arrDatos,true);
            
            if (request()->hasFile('file')) {                            
                $file = request()->file('file');                            
                $foto =  $arrDatos['cedula'] . "." . $file->getClientOriginalExtension();            
                $file->move('./img/tutores/', $foto);                
                $arrDatos['foto'] = $foto;
            }    
            //print_r($arrDatos['fechaNacimiento']);            
            $arrDatos['fechaNacimiento'] = str_replace('/', '-', $arrDatos['fechaNacimiento']);
            $arrDatos['fechaNacimiento'] = date('Y-m-d', strtotime($arrDatos['fechaNacimiento']));
            //$arrDatos['fechaNacimiento'] = date('Y-m-d', strtotime($arrDatos['fechaNacimiento']));                    
            //print_r($arrDatos['fechaNacimiento']);
            $arrWhere['cedula'] = $arrDatos['cedula'];
            
            tutores::updateOrCreate($arrWhere, $arrDatos);
            
            return response()->json(["message" => "" ,"estado"=>0,"message"=>"Realizado con Exito!"]);
        
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }
        //print_r($child);

    }
}


