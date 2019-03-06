<?php
namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;
use App\Models\Compassion_child;
use App\Models\GrupoChild;
use DB;


class ChildrenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:all');
    }

    public function index()
    {
        //$usuarios = User::all();
        $usuarios = User::select("ici_users.*",
                    DB::raw("(SELECT nombre FROM ici_catalogo
                    WHERE ici_users.ciudad = ici_catalogo.id
                    and ici_catalogo.data='C') as nomCiudad")
                    ,
                    DB::raw("(SELECT nombre FROM ici_catalogo
                    WHERE ici_users.pais = ici_catalogo.id
                    and ici_catalogo.data='P') as nomPais")
                    ,
                    DB::raw("(SELECT nombre FROM ici_iglesia
                    WHERE ici_users.iglesia = ici_iglesia.id
                    ) as nomIglesia")
                    ,
                    DB::raw("(SELECT name FROM ici_roles
                    WHERE ici_users.role_id = ici_roles.id
                    ) as nomRol")
                    )->get();        
                    
        $usuarios = null;

        return view('pages.compassion.Children.index', ['usuarios' => $usuarios]);
    }

    public function crudChild(Request $request){
        try{
            $arrDatos = json_decode($request->arrDatos,true);
            

            if (request()->hasFile('file')) {                            
                $file = request()->file('file');                
                //$foto = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();            
                $foto =  $arrDatos['codigo'] . "." . $file->getClientOriginalExtension();            
                $file->move('./img/compassion/', $foto);                
                $arrDatos['foto'] = $foto;
            }                            
                        
            $arrDatos['fechaNacimiento'] = date('Y-m-d', strtotime($arrDatos['fechaNacimiento']));
            
            $actividades = $arrDatos['actividades'];
            $arrDatos['actividades'] = json_encode($arrDatos['actividades']);
            $arrDatos['obligaciones'] = json_encode($arrDatos['obligaciones']);
            $arrDatos['pasatiempos'] = json_encode($arrDatos['pasatiempos']);
            $arrDatos['enfermedades'] = json_encode($arrDatos['enfermedades']);
            $arrDatos['lesiones'] = json_encode($arrDatos['lesiones']);
            $arrDatos['defectooido'] = json_encode($arrDatos['defectooido']);
            $arrDatos['defectovista'] = json_encode($arrDatos['defectovista']);
            $arrDatos['encargados'] = json_encode($arrDatos['encargados']);
            $arrDatos['padrenatural'] = json_encode($arrDatos['padrenatural']);
            $arrDatos['madrenatural'] = json_encode($arrDatos['madrenatural']);
            $arrDatos['hermanoscompassion'] = json_encode($arrDatos['hermanoscompassion']);
            
            $arrWhere['codigo'] = $arrDatos['codigo'];
            
            Compassion_child::updateOrCreate($arrWhere, $arrDatos);
            
            return response()->json(["message" => "" ,"estado"=>0,"message"=>"Realizado con Exito!"]);
        
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }
        //print_r($child);

    }

    public function insertDetalleChild($child, $data, $arrDatos){
        try {
            //code...
            

        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }
    }

    public function listaChildren(Request $request){
        try{
            
            if ($request->filtro == "T"){
                $arrChilds = Compassion_child::all()->toArray();            
            }else{                
                $arrChilds = Compassion_child::where('sexo','=',$request->filtro)->get();                            
            }            
            
            return response()->json(["message" => "" ,"estado"=>0,"data"=>$arrChilds]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }                
    }

    public function getChild(Request $request)
    {
        try{
            //print_r($request->codigo);
            //$Childs = null;
            //$Childs = Compassion_child::find($request->codigo);
            $Childs = Compassion_child::get()->where('codigo','=', $request->codigo)->first();                        
            $Childs->fechaNacimiento = date('d/m/Y', strtotime($Childs->fechaNacimiento));
            

            return response()->json(["message" => "" ,"estado"=>0,"data"=>$Childs]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }  
    }
    
    public function deleteChild(Request $request)
    {
        try{            
            Compassion_child::get()->where('codigo','=', $request->codigo)->first()->delete();

            return response()->json(["message" => "Eliminado con exito!" ,"estado"=>0]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }  
    }
    
    
}


