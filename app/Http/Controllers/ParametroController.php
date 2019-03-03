<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parametro;
use App\Models\Equipo;
use App\Models\About;
use App\Models\Ministerio;
use App\Models\horarios;
use App\Models\Convenio;


use Illuminate\Support\Facades\Validator;
use DB;
use Exception;


class ParametroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:all');
    }

    public function index()
    {                
        return view('pages.parametro.index');
    }

    public function create()
    {
        $cursos = new Cursos;
        return view('pages.cursos.crud', compact('cursos'));
    }

    public function edit($id)
    {      
        $cursos = Cursos::find($id);      
        return view('pages.cursos.crud', compact('cursos'));
    }
    

    public function store(Request $request)
    {
        try {            
            $arrCampos = array(
                'titulo' => $request['titulo'],
                'tutor' => $request['tutor'],
                'fec_inicio' => $request['fec_inicio'],
                'fec_fin' => $request['fec_fin'],
                'detalle' => $request['detalle'],
                'ciudad' => $request['ciudad'],
                'capacidad' => $request['capacidad'],
                //'estado' => $request['estado'],                  
            );
            
            $arrCampos['estado']=($request['estado']!=""?1:0);
        

            $arrWhere['id'] = $request['id'];
       
            if (request()->hasFile('image')) {            
                $validate['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20000';
            }             
            $validate['titulo'] = 'required';

            $validator = Validator::make($request->all(), $validate);                
    
            if ($validator->fails()) {                
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }
                     
            if (request()->hasFile('image')) {                            
                $file = request()->file('image');
                $foto = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();            
                $file->move('./img/cursos/', $foto);                
                $arrCampos['foto']=$foto;
            }    
    
            $cursos = Cursos::updateOrCreate($arrWhere, $arrCampos);
    
            if ($cursos) {
                return redirect()->route('cursos.edit', ['id' => $cursos->id])
                ->with('message', ($request['modo']=="M" ? 'Curso modificado con Exito!': 'Curso registrado con Exito!') )
                ->with('status', 'success');
            }else{    
                return redirect()->back()
                    ->with('message',($request['modo']=="M" ? 'Error al modificar Curso!': 'Error al registrar Curso!'))
                    ->with('status', 'danger')                    
                    ->with('cursos', $cursos);
            }    

        } catch (\Exception $e) {                
            return redirect()->back()
                    ->with('message',$e->getMessage())
                    ->with('status', 'danger')                    
                    ->with('cursos', $arrCampos)->withInput();

        } 

        
    }

    

    public function convenio(Request $request)
    {
        try {            

            $arrCampos = array(
                'titulo' => $request['txtTituloConvenio'],
                'descripcion' => $request['txtDescripcionConvenio'],                
            );
            
                        
            $arrWhere['id'] = $request['txtIdConvenio'];

            $arrConvenio = Convenio::first();
            $arrImagenes = json_decode($arrConvenio->imagenes);

            if (request()->hasFile('image0')) {                 
                $file = request()->file('image0');
                $foto = $file->getClientOriginalName();
                $file->move(public_path('/img/universidad/'), $foto);                
                $arrImagenes[0] = $foto;
            }    

            if (request()->hasFile('image1')) {                            
                $file = request()->file('image1');
                $foto = $file->getClientOriginalName();
                $file->move(public_path('/img/universidad/'), $foto);                
                $arrImagenes[1] = $foto;
            }    

            if (request()->hasFile('image2')) {                            
                $file = request()->file('image2');
                $foto = $file->getClientOriginalName();
                $file->move(public_path('/img/universidad/'), $foto);                
                $arrImagenes[2] = $foto;
            }    

            if (request()->hasFile('fileContrato')) {                            
                $file = request()->file('fileContrato');
                $foto = $file->getClientOriginalName();
                $file->move(public_path('/img/universidad/'), $foto);                
                $arrCampos['contrato'] = $foto;
            }    

            //throw new Exception("Error Processing Request", 1);
            

            $arrCampos['imagenes']  = json_encode($arrImagenes);
    
            $convenio = Convenio::updateOrCreate($arrWhere, $arrCampos);
    
            if ($convenio) {
                return redirect()->to('parametro')
                ->with('message', 'Realizado con Exito!')
                ->with('status', 'success')
                ->with('tab', 'convenio');                
            }else{    
                return redirect()->to('parametro')
                    ->with('message','Error al modificar Convenio!')
                    ->with('status', 'danger');
            }

        } catch (\Exception $e) {            
            return redirect()->to('parametro')
                    ->with('message',$e->getMessage())
                    ->with('status', 'danger')
                    ->with('tab', 'convenio');                     
        } 

        
    }


    public function crudEquipo(Request $request)
    {
        try {            
            $arrCampos = array(
                'nombre' => $request['txtNombre'],
                'cargo' => $request['txtCargo'],
                'descripcion' => $request['txtDescripcion'],                                  
            );
            
                        
            $arrWhere['id'] = $request['txtId'];
       
            if (request()->hasFile('image')) {            
                $validate['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20000';
            }             

            $validate['nombre'] = 'required';
            $validate['cargo'] = 'required';
            $validate['descripcion'] = 'required';

            $validator = Validator::make($arrCampos, $validate);                
    
            if ($validator->fails()) {                
                //return redirect()->back()->withErrors($validator->errors())->withInput();
                return redirect()->to('parametro')
                                ->with('message',$validator->errors())
                                ->with('status', 'danger');     
            }
                     
            if (request()->hasFile('txtFoto')) {                            
                $file = request()->file('txtFoto');
                $foto = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();            
                $file->move('./img/team/', $foto);                
                $arrCampos['foto']=$foto;
            }    
    
            $equipo = Equipo::updateOrCreate($arrWhere, $arrCampos);
    
            if ($equipo) {
                return redirect()->to('parametro')
                ->with('message', ($request['txtEstado']=="M" ? 'Curso modificado con Equipo!': 'Equipo registrado con Exito!') )
                ->with('status', 'success')
                ->with('tab', 'equipo');                
            }else{    
                return redirect()->to('parametro')
                    ->with('message',($request['txtEstado']=="M" ? 'Error al modificar Equipo!': 'Error al registrar Equipo!'))
                    ->with('status', 'danger');
            }                

            //return redirect()->to('parametro')->with('message','Exito pana')
            //->with('status', 'success');     
            
        } catch (\Exception $e) {            
            return redirect()->to('parametro')
                    ->with('message',$e->getMessage())
                    ->with('status', 'danger')
                    ->with('tab', 'equipo');                     

        } 

        
    }

    public function crudHorario(Request $request){
        try {            

            $arrCampos = array(
                'dia' => $request['txtDiaHorario'],
                'titulo' => $request['txtTituloHorario'],
                'lugar' => $request['txtLugarHorario'],
                'horario' => $request['txtHoraHorario'],
                'comentario' => $request['txtComentarioHorario']
            );
                                
            $arrWhere['id'] = $request['txtIdHorario'];
       
            $validate['dia'] = 'required';
            $validate['titulo'] = 'required';
            $validate['lugar'] = 'required';
            $validate['horario'] = 'required';

            $validator = Validator::make($arrCampos, $validate);                
            if ($validator->fails()) {                    
                return redirect()->to('parametro')
                                ->with('message',$validator->errors())
                                ->with('status', 'danger');     
            }                                 
    
            $horario = horarios::updateOrCreate($arrWhere, $arrCampos);
    
            if ($horario) {
                return redirect()->to('parametro')
                ->with('message', ($request['txtIdHorario']!="" ? 'Horario modificado con Horario!': 'Horario registrado con Exito!') )
                ->with('status', 'success')
                ->with('tab', 'horarios');                
            }else{    
                return redirect()->to('parametro')
                    ->with('message',($request['txtIdHorario']!="" ? 'Error al modificar Horario!': 'Error al registrar Horario!'))
                    ->with('status', 'danger');
            }                

        } catch (\Exception $e) {            
            return redirect()->to('parametro')
                    ->with('message',$e->getMessage())
                    ->with('status', 'danger')
                    ->with('tab', 'horarios');                     
        } 

        
    }
    
    public function eliminarHorario(Request $request){
        try {
            $horario = horarios::find($request->id);
                        
            if($horario->delete()){                    
                return redirect()->to('parametro')
                    ->with('message','Realizado con Exito!')
                    ->with('status', 'success')
                    ->with('tab', 'horarios');         
            }else{                
                return redirect()->to('parametro')
                    ->with('message','Error al eliminar Horario!')
                    ->with('status', 'danger')
                    ->with('tab', 'horarios');         
            }                
            
        } catch (\Exception $e) {                
            return redirect()->to('parametro')
                ->with('message',$e->getMessage())
                ->with('status', 'danger')
                ->with('tab', 'horarios');      
        }
    }


    public function crudAbout(Request $request)
    {
        try {            
            $arrCampos = array(
                'name' => $request['aboutNombre'],
                'enlace' => "#". $request['aboutNombre'],
                'panel' => $request['aboutNombre'],
                'titulo' => $request['aboutTitulo'],
                'descripcion' => $request['aboutDescripcion'],          
                'orden' => $request['aboutOrden'],                                                
            );
            
                        
            $arrWhere['id'] = $request['aboutId'];
       
            if (request()->hasFile('image')) {            
                $validate['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20000';
            }             

            $validate['name'] = 'required';
            $validate['titulo'] = 'required';
            $validate['descripcion'] = 'required';

            $validator = Validator::make($arrCampos, $validate);                
    
            if ($validator->fails()) {                
                //return redirect()->back()->withErrors($validator->errors())->withInput();
                return redirect()->to('parametro')
                                ->with('message',$validator->errors())
                                ->with('status', 'danger')
                                ->with('panel', 'About');     
            }
                     
            if (request()->hasFile('aboutFoto')) {                            
                $file = request()->file('aboutFoto');
                $foto = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();            
                $file->move('./img/about/', $foto);                
                $arrCampos['foto']=$foto;
            }    
            /*print_r($arrCampos);
            print_r($arrWhere);
            die();*/
            $about = About::updateOrCreate($arrWhere, $arrCampos);
    
            if ($about) {
                return redirect()->to('parametro')
                ->with('message', ($request['aboutEstado']=="M" ? 'About modificado con Equipo!': 'About registrado con Exito!') )
                ->with('status', 'success')
                ->with('panel', 'About');                
            }else{    
                return redirect()->to('parametro')
                    ->with('message',($request['aboutEstado']=="M" ? 'Error al modificar About!': 'Error al registrar About!'))
                    ->with('status', 'danger')
                    ->with('panel', 'About');                
            }                

            //return redirect()->to('parametro')->with('message','Exito pana')
            //->with('status', 'success');     
            
        } catch (\Exception $e) {            
            return redirect()->to('parametro')
                    ->with('message',$e->getMessage())
                    ->with('status', 'danger')
                    ->with('panel', 'About');                     

        } 

        
    }
    
    
    public function eliminarEquipo(Request $request)
    {
            try {

                $rol = Equipo::find($request->id);            
                
                if($rol->delete()){
                    //return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0]);
                    return redirect()->to('parametro')
                        ->with('message','Realizado con Exito!')
                        ->with('status', 'success')
                        ->with('tab', 'equipo');         
                }else{
                    //return response()->json(["message" => "Error al eliminar Rol!" ,"estado"=>1]);
                    return redirect()->to('parametro')
                        ->with('message','Error al eliminar Rol!')
                        ->with('status', 'danger')
                        ->with('tab', 'equipo');         
                }                
                
            } catch (\Exception $e) {                

                //return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
                return redirect()->to('parametro')
                        ->with('message',$e->getMessage())
                        ->with('status', 'danger')
                        ->with('tab', 'equipo');      
            }

    }


    public function eliminarAbout(Request $request)
    {
            try {

                $about = About::find($request->id);            
                
                if($about->delete()){                    
                    return redirect()->to('parametro')
                        ->with('message','Realizado con Exito!')
                        ->with('status', 'success')
                        ->with('panel', 'About');         
                }else{                    
                    return redirect()->to('parametro')
                        ->with('message','Error al eliminar Rol!')
                        ->with('status', 'danger')
                        ->with('panel', 'About');         
                }                
                
            } catch (\Exception $e) {                
                return redirect()->to('parametro')
                        ->with('message',$e->getMessage())
                        ->with('status', 'danger')
                        ->with('panel', 'About');         
            }

    }


    public function crudMinisterio(Request $request)
    {
        try {            
            $arrCampos = array(
                'titulo' => $request['ministerioTitulo'],
                'dia' => $request['ministerioDia'],
                'desde' => $request['ministerioDesde'],
                'hasta' => $request['ministerioHasta'],
                'descripcion' => $request['ministerioDescripcion'],          
                'orden' => $request['ministerioOrden'],                                                
            );
            
                        
            $arrWhere['id'] = $request['ministerioId'];
       
            if (request()->hasFile('ministerioFoto')) {            
                $arrCampos['ministerioFoto'] = $request['ministerioFoto'];
                $validate['ministerioFoto'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20000';
            }             

            $validate['titulo'] = 'required';
            $validate['dia'] = 'required';
            $validate['desde'] = 'required';
            $validate['hasta'] = 'required';
            $validate['orden'] = 'required';
            $validate['descripcion'] = 'required';
            
            $validator = Validator::make($arrCampos, $validate);                
    
            if ($validator->fails()) {                
                return redirect()->to('parametro')
                                ->with('message',$validator->errors())
                                ->with('status', 'danger')
                                ->with('tab', 'ministerio');     
            }
                     
            if (request()->hasFile('ministerioFoto')) {                            
                $file = request()->file('ministerioFoto');
                $foto = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();            
                $file->move('./img/ministerios/', $foto);                
                $arrCampos['foto']=$foto;
            }    
            
            $ministerio = Ministerio::updateOrCreate($arrWhere, $arrCampos);
    
            if ($ministerio) {
                return redirect()->to('parametro')
                ->with('message', ($request['ministerioEstado']=="M" ? 'Ministerio modificado con Equipo!': 'Ministerio registrado con Exito!') )
                ->with('status', 'success')
                ->with('tab', 'ministerio');     
            }else{    
                return redirect()->to('parametro')
                    ->with('message',($request['ministerioEstado']=="M" ? 'Error al modificar Ministerio!': 'Error al registrar Ministerio!'))
                    ->with('status', 'danger')
                    ->with('tab', 'ministerio');                 
            }                

        } catch (\Exception $e) {            
            return redirect()->to('parametro')
                    ->with('message',$e->getMessage())
                    ->with('status', 'danger')
                    ->with('tab', 'ministerio');     
        } 

        
    }

    public function eliminarMinisterio(Request $request)
    {
        try {

            $ministerio = Ministerio::find($request->id);            
            
            if($ministerio->delete()){                    
                return redirect()->to('parametro')
                    ->with('message','Realizado con Exito!')
                    ->with('status', 'success')
                    ->with('tab', 'ministerio');         
            }else{                    
                return redirect()->to('parametro')
                    ->with('message','Error al eliminar Rol!')
                    ->with('status', 'danger')
                    ->with('tab', 'ministerio');         
            }                
            
        } catch (\Exception $e) {                
            return redirect()->to('parametro')
                    ->with('message',$e->getMessage())
                    ->with('status', 'danger')
                    ->with('tab', 'ministerio');         
        }
    }

    

}
