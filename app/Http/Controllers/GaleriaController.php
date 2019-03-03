<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeria;
use DB;
use Exception;

class GaleriaController extends Controller{
    
    public function __construct(){
        $this->middleware('auth:all');
    }

    public function listaGaleria(){                                
        try {            
        	$arrGaleria = Galeria::all();
            return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0, "data" => $arrGaleria]);
        } catch (\Exception $e) {                
            return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }     
    }

    public function uploadFile(Request $request){                                
        try {            
        	
        	if (request()->hasFile('file')) {                            
                $file = request()->file('file');                
                $foto = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();            			

                $arrCampos['ruta'] = '/img/galeria/';
                $arrCampos['archivo'] = $foto;
                $arrCampos['tipo'] = 'G';
                $file->move('./img/galeria/', $foto);                                
            }    

            $arrWhere['id'] = $request->codigo;

            $galeria = Galeria::updateOrCreate($arrWhere, $arrCampos);

            if ($galeria) {
            	return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0]);
            }else{    
                throw new Exception("Error al registrar!", 1);
            }   
            
        } catch (\Exception $e) {                
        	return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }     
    }

    public function eliminarImagen(Request $request)
    {
    	try {            
        	        	

            $galeria = Galeria::where('id','=',$request->id)->first();

            if ($galeria->delete()) {      
            	$imagen = $galeria->ruta.$galeria->archivo;      	
            	if(file_exists(public_path($imagen))){
				  unlink(public_path($imagen));
				}else{
					throw new Exception("El archivo no existe!", 1);				
				}

            	return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0]);
            }else{    
                throw new Exception("Error al eliminar!", 1);
            }   
            
        } catch (\Exception $e) {                
        	return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }  
    }

    


}
