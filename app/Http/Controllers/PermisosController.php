<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Menu;
use App\Models\menu_x_rol;
use App\Models\HomeCard;
use Illuminate\Support\Facades\Validator;
use DB;


class PermisosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:all');
    }

    public function index()
    {                
        $menu = Menu::allMenu();        
        return view('pages.seguridad.permisos.index')
        ->with('menu', $menu);
    }

    public function addRemove(Request $request){
        try {                       

            DB::table('ici_menu_x_rol')->where('role_id', '=', $request->role)->delete();

            if (!empty($request->permisos)){                        
                foreach ($request->permisos as $clave => $menu) {                                       
                    $arrCampos = array(
                        'role_id' => $request->role,
                        'menu_id' => $menu['id']
                    );        
                    DB::table('ici_menu_x_rol')->insert($arrCampos);                    
                }
            } 
            
            return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0]);

        } catch (\Exception $e) {            
            return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }


    }


    public function getPermisoRol(Request $request){
        try {                       

            $permisos = DB::table('ici_menu_x_rol')->where('role_id', '=', $request->role)->get();

            return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0,"data"=>$permisos]);

        } catch (\Exception $e) {            
            return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }


    }



}
