<?php namespace App\Http\Controllers;
//namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Lista;
//use App\Traits\ActivationTrait;
//use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use DB;

class UsuarioController extends Controller
{
    
    //use RegistersUsers, ActivationTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function __construct()
    {
        $this->middleware('auth:all');
    }

    public function getHome(){        
        return view('panels.home');

    }

    public function index()
    {
        //$usuarios = User::all();
        $usuarios = User::select("ici_users.*",
                    DB::raw("(SELECT nombre FROM ici_catalogo_det
                    WHERE ici_users.ciudad = ici_catalogo_det.id
                    and ici_catalogo_det.data='C') as nomCiudad")
                    ,
                    DB::raw("(SELECT nombre FROM ici_catalogo_det
                    WHERE ici_users.pais = ici_catalogo_det.id
                    and ici_catalogo_det.data='P') as nomPais")
                    ,
                    DB::raw("(SELECT nombre FROM ici_iglesia
                    WHERE ici_users.iglesia = ici_iglesia.id
                    ) as nomIglesia")
                    ,
                    DB::raw("(SELECT name FROM ici_roles
                    WHERE ici_users.role_id = ici_roles.id
                    ) as nomRol")
                    )->get();        
                    
        return view('pages.seguridad.usuarios.index', ['usuarios' => $usuarios]);
    }

    public function listaUsuario(Request $request){
      //$Usuarios = User::all()->toArray();
      $usuarios = array();
      $usuarios = User::select("ici_users.*",
                    DB::raw("(SELECT nombre FROM ici_catalogo_det
                    WHERE ici_users.ciudad = ici_catalogo_det.id
                    and ici_catalogo_det.data='C') as nomCiudad")
                    ,
                    DB::raw("(SELECT nombre FROM ici_catalogo_det
                    WHERE ici_users.pais = ici_catalogo_det.id
                    and ici_catalogo_det.data='P') as nomPais")
                    ,
                    DB::raw("(SELECT nombre FROM ici_iglesia
                    WHERE ici_users.iglesia = ici_iglesia.id
                    ) as nomIglesia")
                    ,
                    DB::raw("(SELECT descripcion FROM ici_roles
                    WHERE ici_users.role_id = ici_roles.id
                    ) as nomRol")
                    ,
                    DB::raw("(SELECT provider FROM ici_social_logins
                    WHERE ici_users.id = ici_social_logins.user_id
                    ) as nomSocial")
                    
                    )->get();

      return response()->json(["message" => "" ,"estado"=> 0, "data"=>$usuarios]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = new User;
        return view('pages.seguridad.usuarios.crud', compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = null;
            $arrCampos = array(
                'username' => $request['username'],
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'direccion' => $request['direccion'],
                'ciudad' => $request['ciudad'],
                'pais' => $request['pais'],
                'iglesia' => $request['iglesia'],
                //'password' => bcrypt($request['password']),
                //'token' => str_random(64),
                //'activated' => !config('settings.activation'),
                'role_id'=>$request['role'],            
            );
    
            if (isset($request['password'])){
                $arrCampos['password'] = bcrypt($request['password']);
            } 

            $arrWhere['id'] = $request['id'];
       
            if (request()->hasFile('image')) {            
                $validate['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20000';
            }             
    
            $validate['username'] = 'required|unique:ici_users,username,'.$request['id'].'|max:255';
    
            $validator = Validator::make($request->all(), $validate);                
    
            if ($validator->fails()) {
                //return redirect('post/create')->withErrors($validator)->withInput();
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }
                     
            if (request()->hasFile('image')) {            
                
                $file = request()->file('image');
                $foto = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();            

                $file->move('./img/usuarios/', $foto);
                
                $arrCampos['foto']= '/img/usuarios/'. $foto;
            }    
    
            $user = User::updateOrCreate($arrWhere, $arrCampos);
    
            if ($user) {
                return redirect()->route('usuarios.show', ['id' => $user->id])
                ->with('message', ($request['estado']=="M" ? 'Usuario modificado con Exito!': 'Usuario registrado con Exito!') )
                ->with('status', 'success');
            }else{    
                return redirect()->back()
                    ->with('message',($request['estado']=="M" ? 'Error al modificar Usuario!': 'Error al registrar Usuario!'))
                    ->with('status', 'danger')
                    ->with('roles', Role::all())
                    ->with('usuario', $user);
            }    

        } catch (\Exception $e) {            
            return redirect()->back()
                    ->with('message',$e->getMessage())
                    ->with('status', 'danger')
                    ->with('roles', Role::all())
                    ->with('usuario', $user);

        } 

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        return view('pages.seguridad.usuarios.crud', compact('data','usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request)
    {
            try {

                DB::beginTransaction();
                $estudiante = User::find($request->id)->delete();            
                DB::commit();
                return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0]);

            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
            }

    }
}
