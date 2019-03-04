<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;
use App\Models\usuario_x_curso;
use App\Models\Maestro;

use Illuminate\Support\Facades\Validator;
use DB;
use Exception;

class CursosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:all');
    }

    public function index()
    {                
        $cursos = Cursos::all();                
        return view('pages.cursos.index',['cursos' => $cursos]);
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
    
    public function addInscripcion(Request $request)
    {      
        $usuarioId = auth()->user()->id;        
        
        $cursos = DB::table('ici_cursos')
                    ->leftJoin('ici_usuario_x_curso', 'ici_cursos.id', '=', 'ici_usuario_x_curso.cursoId')            
                    ->select('ici_cursos.capacidad',
                        DB::raw("(SELECT count(*) FROM ici_usuario_x_curso as a
                        WHERE a.cursoId = ici_usuario_x_curso.cursoId) as inscritos")
                    )->where('cursoId', '=', $request['id'])->first();
        
        if ($cursos){            
            $id = $request['id'];
            if ($cursos->capacidad==$cursos->inscritos && $request['modo']=="ADD"){
                $cursos = Cursos::select("ici_cursos.*",
                DB::raw("(SELECT 1 FROM ici_usuario_x_curso as a
                WHERE a.usuarioId = $usuarioId
                and a.cursoId=$id) as suscrito")      
                )->where('id','=',$id)->first();
                            
                return redirect()->back()
                    ->with('message','Capacidad de inscritos esta al  limite!')
                    ->with('status', 'danger')
                    ->with('cursos',  $cursos);
            }                        
        } 
        
        
        $usuarioCurso = DB::table('ici_usuario_x_curso')->where('cursoId', '=', $request['id'])
                                    ->where('usuarioId', '=', $usuarioId);

        if  (!$usuarioCurso->delete()){
            $arrCampos = array(
                'cursoId' => $request['id'],
                'usuarioId' => $usuarioId,            
                'usuario_registro' => $usuarioId,            
            );
            $cursos = usuario_x_curso::create($arrCampos);
        }        
        return redirect()->route('inscripcion', ['id' => $request['id']]);        
    }
    

    public function store(Request $request)
    {
        try {            
            $arrCampos = array(
                'titulo' => $request['titulo'],
                'maestro' => $request['maestro'],                
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

    public function inscripcion($id)
    {
        $usuarioId = auth()->user()->id;
        
        //$cursos = Cursos::find($id);

        $cursos = Cursos::select("ici_cursos.*",
        DB::raw("(SELECT 1 FROM ici_usuario_x_curso as a
        WHERE a.usuarioId = $usuarioId
        and a.cursoId=$id) as suscrito")      
        )->where('id','=',$id)->first();
        
        return view('pages.cursos.inscripcion', compact('cursos'));
    }


    public function asistencia()
    {        
        $curso = 2;        
        return view('pages.cursos.asistencia', compact('curso'));
    }
    
    public function addRemove(Request $request){
        try {                       

            DB::table('ici_usuario_x_curso')->where('cursoId',$request->curso)->update(array('asistencia' => "0"));

            if (!empty($request->marcadas)){                        
                
                foreach ($request->marcadas as $clave => $asiste) {                                                           
                    
                    DB::table('ici_usuario_x_curso')->where('cursoId',$request->curso)
                    ->where('usuarioId',$asiste['id'])->update(array('asistencia' => "1"))
                                                ;
                }
            } 
            
            return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0]);

        } catch (\Exception $e) {            
            return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }
    }



    public function inscripciones()
    {
        $usuarioId = auth()->user()->id;
        $cursos = Cursos::all();
        /*$cursos = Cursos::select("Cursos.*",
        DB::raw("(SELECT 1 FROM usuario_x_curso as a
        WHERE a.usuarioId = $usuarioId
        and a.cursoId=$id) as suscrito")      
        )->where('id','=',$id)->first();*/
        $cursos = DB::table('ici_cursos')
            ->leftJoin('ici_usuario_x_curso', 'ici_cursos.id', '=', 
                DB::raw('ici_usuario_x_curso.cursoId AND ici_usuario_x_curso.usuarioId = ' . $usuarioId)
            )
            ->select('ici_cursos.*', 'ici_usuario_x_curso.usuarioId')->get();

        return view('pages.cursos.inscripcionesCursos   ', compact('cursos'));
    }




    

    public function eliminar(Request $request)
    {
        try {

            $rol = Cursos::find($request->id);            
            
            if($rol->delete()){
                return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0]);
            }else{
                return response()->json(["message" => "Error al eliminar Rol!" ,"estado"=>1]);
            }                
            
        } catch (\Exception $e) {                
            return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }

    }

    public function getCronogramas(Request $request){
        try {

            $cronogramas = DB::table('ici_cronograma_cursos')->where('curso',$request->curso)->get();            
            return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0, "data" => $cronogramas]);
            
        } catch (\Exception $e) {                
            return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }     
    }

    public function deleteCronograma(Request $request){
        try {

            if(DB::table('ici_cronograma_cursos')->where('id',$request->id)->delete()){
                return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0]);
            }else{
                return response()->json(["message" => "Error al eliminar Cronograma!" ,"estado"=>1]);
            }              
            
        } catch (\Exception $e) {                
            return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }     
    }

    public function saveCronograma(Request $request){
        try {

            $arrCampos = array(
                'title' => $request->title, 
                'description' => $request->description, 
                'start_date' => $request->start_date, 
                'end_date' => $request->end_date,                
                'url' => $request->url            
            );

            if(!DB::table('ici_cronograma_cursos')->where('id',$request->id)->exists()){
                $arrCampos['curso'] = $request->curso;                                
                $arrCampos['created'] = date("y-m-d H:i:s");
                if (!DB::table('ici_cronograma_cursos')->insert($arrCampos)) {
                    throw new Exception("Error al insertar registros", 1);                    
                }
            }else{
                if (!DB::table('ici_cronograma_cursos')->where('id', $request->id)->update($arrCampos)) {
                    throw new Exception("Error al actualizar registros", 1);                       
                }
            }              
            
            return response()->json(["message" => 'Realizado con éxito!' ,"estado"=>0]);

        } catch (\Exception $e) {                
            return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }
    } 

     public function allMaestros(Request $request){
        try {

            $arrMaestros = DB::table('ici_maestro as a')
                        ->join('ici_users as b', 'a.userId', '=','b.id')
                        ->select("a.id as codigoMaestro","a.nivel_estudio","a.especialidad","a.cargo_actual","b.*")->get();            

            return response()->json(["message" => 'Realizado con éxito!' ,"estado"=>0, "data" =>$arrMaestros]);

        } catch (\Exception $e) {                
            return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }
    } 

    

    public function saveMaestro(Request $request)
    {
        try {            
            
            $arrCampos = array(
                'nivel_estudio' => $request->nivel_estudio, 
                'especialidad' => $request->especialidad, 
                'cargo_actual' => $request->cargo_actual,                 
                'userId' => $request->userId,                                 
            );


            $arrWhere['id'] = $request['id'];

            $maestro = Maestro::updateOrCreate($arrWhere, $arrCampos);
    
            if ($maestro) {
                return response()->json(["message" => 'Realizado con éxito!' ,"estado"=>0]);
            }else{    
                throw new Exception("Error al grabar maestro!", 1);                
            }    

        } catch (\Exception $e) {                
            return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }         
    }

    public function deleteMaestro(Request $request)
    {
        try {

            $maestro = Maestro::find($request->id);            
            
            if($maestro->delete()){
                return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0]);
            }else{
                return response()->json(["message" => "Error al eliminar maestro!" ,"estado"=>1]);
            }                
            
        } catch (\Exception $e) {                
            return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }

    }
     
        
}
