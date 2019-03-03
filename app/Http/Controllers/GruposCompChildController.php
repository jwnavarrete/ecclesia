<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compassion_Grupos;

class GruposCompChildController extends Controller
{
    public function __construct(){
        $this->middleware('auth:all');
    }

    public function index(){     
        return view('pages.compassion.Grupos.index');
    }

    public function listarCursos(Request $request){
        try{
            
            if ($request->filtro == "T"){
                $arrTutores = Compassion_Grupos::all()->toArray();            
            }else{                
                $arrTutores = Compassion_Grupos::where('sexo','=',$request->filtro)->get();                            
            }
            
            return response()->json(["message" => "" ,"estado"=>0,"data"=>$arrTutores]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }                
    }

    
    public function deleteGrupo(Request $request)
    {
        try{            
            Compassion_Grupos::get()->where('id','=', $request->codigo)->first()->delete();                        

            return response()->json(["message" => "Eliminado con exito!" ,"estado"=>0]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }  
    }

    
    public function getGrupo(Request $request)
    {
        try{            
            $Grupo = Compassion_Grupos::get()->where('id','=', $request->codigo)->first();            
        
            return response()->json(["message" => "" ,"estado"=>0,"data"=>$Grupo]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }  
    }
    
    public function crud(Request $request){
        try{
            $arrDatos = json_decode($request->arrDatos,true);
                                    
            $arrWhere['id'] = $arrDatos['codigo'];
            unset($arrDatos['codigo']);
            
            Compassion_Grupos::updateOrCreate($arrWhere, $arrDatos);
            
            return response()->json(["message" => "" ,"estado"=>0,"message"=>"Realizado con Exito!"]);
        
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }

    }


    
}
