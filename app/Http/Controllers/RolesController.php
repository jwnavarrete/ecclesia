<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:all');
    }


    public function index()
    {
        $roles = Role::all();        
        return view('pages.seguridad.roles.index', ['roles' => $roles]);
    }


    public function create()
    {
        $role = new Role;
        return view('pages.seguridad.roles.crud', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('pages.seguridad.roles.crud', compact('role'));
    }

    public function store(Request $request)
    {
        $role = null;
        try {

            $arrCampos = array(
                'name' => $request['name'],      
                'descripcion' => $request['descripcion'],                 
            );

            $arrWhere['id'] = $request['id'];
    
            $validate['name'] = 'required|unique:ici_roles,name,'.$request['id'].'|max:255';
            $validator = Validator::make($request->all(), $validate);                
    
            if ($validator->fails()) {                
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }

            $role = Role::updateOrCreate($arrWhere, $arrCampos);
    
            if ($role) {
                return redirect()->route('roles.edit', ['id' => $role->id])
                ->with('message', ($request['estado']=="M" ? 'Rol modificado con Exito!': 'Rol registrado con Exito!') )
                ->with('status', 'success');
            }else{    
                return redirect()->back()
                    ->with('message',($request['estado']=="M" ? 'Error al modificar Rol!': 'Error al registrar Rol!'))
                    ->with('status', 'danger')
                    ->with('role', $role);
            }    

        } catch (\Exception $e) {            
            return redirect()->back()
                    ->with('message',$e->getMessage())
                    ->with('status', 'danger')
                    ->with('roles', $role);
        }         
    }

    public function eliminar(Request $request)
    {
            try {

                $rol = Role::find($request->id);            
                
                if($rol->delete()){
                    return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0]);
                }else{
                    return response()->json(["message" => "Error al eliminar Rol!" ,"estado"=>1]);
                }                
                
            } catch (\Exception $e) {                
                return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
            }

    }


}
