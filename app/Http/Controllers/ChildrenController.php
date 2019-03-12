<?php
namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;
use App\Models\Compassion_child;
use App\Models\Compassion_child_list;
use App\Models\GrupoChild;
use DB;


class ChildrenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:all');
    }

    public function index(){        
        return view('pages.compassion.Children.index');
    }

    public function crudChild(Request $request){
        try{
            $arrDatos = json_decode($request->arrDatos,true);
            $arrListas = json_decode($request->arrListas,true);            

            if (request()->hasFile('file')) {                            
                $file = request()->file('file');                
                //$foto = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();            
                $foto =  $arrDatos['codigo'] . "." . $file->getClientOriginalExtension();            
                $file->move('./img/compassion/', $foto);                
                $arrDatos['foto'] = $foto;
            }                            
                        
            $arrDatos['hermanos_compassion'] = json_encode($arrDatos['hermanos_compassion']);
            $arrDatos['fecha_nacimiento'] = date('Y-m-d', strtotime($arrDatos['fecha_nacimiento']));                                
            $arrWhere['codigo'] = $arrDatos['codigo'];            

            Compassion_child::updateOrCreate($arrWhere, $arrDatos);
                        
            foreach ($arrListas as $data => $lista) {                                
                $this->insertDetalleChild($arrDatos['codigo'], $data, $lista);
            }

            return response()->json(["message" => "" ,"estado"=>0,"message"=>"Realizado con Exito!"]);
        
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }        
    }

    public function insertDetalleChild($child, $data, $arrLista){
        try {
                        
            DB::table('ici_comp_child_list')
                ->where('child', '=', $child)
                ->where('data', '=', $data)
                ->delete();
            
            foreach ($arrLista as $key => $codigo) {                
                $user = Compassion_child_list::create([
                    'child' => $child,
                    'data' => $data,
                    'codigo' => $codigo
                ]);                
            }

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

            foreach ($arrChilds as $key => $child) {           
                $codigo = $child['codigo'];
                $arrChilds[$key]['nombrecompleto'] = "$child[apellido_paterno]  $child[apellido_materno] $child[primer_nombre] $child[segundo_nombre]";
            }
            
            return response()->json(["message" => "" ,"estado"=>0,"data"=>$arrChilds]);
        }catch (\Exception $e){
            return response()->json(["message" => "" ,"estado"=>1,"message"=>$e->getMessage()]);                       
        }                
    }

    public function getListJson($child, $data)
    {
        return Compassion_child_list::where('child', $child)->where('data', $data)->pluck('codigo')->toJson();        
    }

    public function getChild(Request $request)
    {
        try{
            
            $Childs = Compassion_child::get()->where('codigo','=', $request->codigo)->first();            
            //OBETENEMOS LAS LISTAS DE CATALOGO / MARCADAS
            $Childs->arrActividades = $this->getListJson($Childs->codigo, 'ACT');
            $Childs->arrObligaciones = $this->getListJson($Childs->codigo, 'OBL');
            $Childs->arrPasatiempos = $this->getListJson($Childs->codigo, 'PAS');
            $Childs->arrSalud = $this->getListJson($Childs->codigo, 'S');
            $Childs->arrGuardianes = $this->getListJson($Childs->codigo, 'GR');
            $Childs->arrActGuarMas = $this->getListJson($Childs->codigo, 'AGRM');
            $Childs->arrActGuarFem = $this->getListJson($Childs->codigo, 'AGRF');
            $Childs->arrPadreNatural = $this->getListJson($Childs->codigo, 'PNM');
            $Childs->arrMadreNatural = $this->getListJson($Childs->codigo, 'PNF');

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


