<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeCard;
use Exception;
use DB;

class HomeCardController extends Controller{
    
    public function __construct(){
        $this->middleware('auth:all');
    }

    public function index(){                
        return view('pages.seguridad.homeCard.index');        
    }

    public function listar(Request $request){
        try{     

            $cards = HomeCard::join('ici_menu as m', 'm.id', '=','ici_home_card.idMenu')
            ->select('ici_home_card.*','m.id as url','m.slug as urlDescripcion')            
            ->get();
            
            return response()->json(["estado"=>0,"data"=> $cards]);               
                    
        }catch (Exception $e){
            return response()->json(["estado"=>1,"data"=> [], "message"=>$e->getMessage()]);                       
        }        
    }

    public function crud(Request $request){
        try{          	          	
            $arrWhere['id'] = $request->id;        
            
            $arrCampos['id'] = $request->id;
            $arrCampos['titulo'] = $request->titulo;
            $arrCampos['icono'] = $request->icono;        
            $arrCampos['detalle'] = $request->detalle;
            $arrCampos['tabla'] = $request->tabla;
            $arrCampos['idMenu'] = $request->url;
            $arrCampos['color'] = $request->color;

            $resultado = HomeCard::updateOrCreate($arrWhere, $arrCampos);
						                                                                    
            if ($resultado) {
            	return response()->json(["estado"=>0,"message"=>"Realizado con Exito!"]);            	
            }else{    
                throw new Exception("Error al grabar datos", 1);                
            }    
        
        }catch (\Exception $e){
            return response()->json(["estado"=>1,"message"=>$e->getMessage()]);                       
        }        
    }

    public function delete(Request $request){
        try{            
            HomeCard::get()->where('id','=', $request->id)->first()->delete();                        

            return response()->json(["message" => "Eliminado con exito!" ,"estado"=>0]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }  
    }

    public function getPermisoByRol(Request $request){
        try{                            
            $arrPermisos = DB::table('ici_home_card as a')            
             ->leftJoin('ici_home_card_roles as b', function($join) use ($request)
             {                
                $join->on('a.id', '=', 'b.idCard');
                $join->on('b.idRol','=',DB::raw($request->idRol));                 
             })
            ->join('ici_menu as m', 'm.id', '=','a.idMenu')
            ->join('ici_menu_x_rol as r', 'r.menu_id', '=','m.id')->where('r.role_id','=',$request->idRol)
            ->select('a.id','a.titulo','b.idRol','b.orden')               
            ->orderBy('b.orden')             
            ->get();  

            return response()->json(["message" => "" ,"estado"=>0,"data"=>$arrPermisos]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }                
    }

    public function addRemoveCard(Request $request){
        try{            
            
            $exist = DB::table('ici_home_card_roles')
             ->where('idCard','=',$request->idCard)
            ->where('idRol','=',$request->idRol)
            ->exists();

            if ($exist) {
                DB::table('ici_home_card_roles')
                ->where('idCard','=',$request->idCard)
                ->where('idRol','=',$request->idRol)
                ->delete();    
            }else{
                DB::table('ici_home_card_roles')->insert(
                    ['idCard' => $request->idCard, 'idRol' => $request->idRol, 'orden' => '']
                );
            }
            return response()->json(["message" => "Realizado con exito!" ,"estado"=>0]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }  
    }

    public function changeOrderCard(Request $request){
        try{        
            DB::table('ici_home_card_roles')
                ->where('idCard','=',$request->idCard)
                ->where('idRol','=',$request->idRol)
                ->update(['orden' => $request->order]);

            return response()->json(["message" => "Realizado con exito!" ,"estado"=>0]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }          
    }

}
