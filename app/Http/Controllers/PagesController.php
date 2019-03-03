<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;
use Mail;
use App\Models\Iglesia;

class PagesController extends Controller
{

    public function getHome(){        
        return view('layouts.home');
    }

    public function enviarMensaje(Request $request){               
    	try {
    
            $data = array(
                'nombre' => $request->nombre, 
                'mensaje' => $request->mensaje, 
                'correo' => $request->correo, 
            );

            
            $iglesia = Iglesia::findOrFail('1');

            Mail::send('emails.contacto', $data , function ($m) use ($iglesia, $request) {
                $m->from($iglesia->correoContacto, 'ICIR');                  
                $m->to($iglesia->correoContacto, $request->nombre)->subject($request->asunto);
            });

        	return redirect()->to('/')
                    ->with('message','Mensaje enviado con Éxito!');
                    
	    } catch (\Exception $e) {
	     	return redirect()->to('/')
                    ->with('message',$e->getMessage());                    
	    } 
    	
    }
     

}