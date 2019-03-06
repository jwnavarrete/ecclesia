<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use App\Traits\ActivationTrait;
use Illuminate\Support\Facades\Validator;
use App\Traits\CaptchaTrait;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, ActivationTrait, CaptchaTrait;

    /**
     * Auth guard
     *
     * @var
     */
    protected $auth;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * LoginController constructor.
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->auth = $auth;
    }


    public function login(Request $request)
    {
        
        
        // $secret   = env('RE_CAP_LOGIN');
        
        
        // if ($secret=="S"){            
        //     $request['captcha'] = $this->captchaCheck();     
        // } 

        $rule['email']='required|email';
        $rule['password']='required|min:6|max:20';

        // if ($secret=="S"){            
        //     $rule['g-recaptcha-response']='required';
        //     $rule['captcha']='required|min:1';
        // } 
        
        $mensaje['email.required']='Email es obligatorio';
        $mensaje['email.email']='Email invalido';
        $mensaje['password.required']='Contraseña es obligatoria';
        $mensaje['password.min']='La contraseña debe tener al menos 6 caracteres';
        $mensaje['password.max']='La longitud máxima de la contraseña es de 20 caracteres';

        // if ($secret=="S"){
        //     $rule['g-recaptcha-response.required']='Captcha es obligatorio';
        //     $rule['captcha.min']='Captcha incorrecto, por favor intente de nuevo.';
        // } 
        
        $v = Validator::make($request->all(),$rule,$mensaje);
        
        if ($v->fails())    
        {                     
            return redirect()->back()->withErrors($v->errors());
        }
        
        
        
        $email      = $request->get('email');
        $password   = $request->get('password');
        $remember   = $request->get('remember');

        if ($this->auth->attempt([
            'email'     => $email,
            'password'  => $password
        ], $remember == 1 ? true : false)) {

            return redirect()->route('home')->with('status', 'success')                
            ->with('message', 'bienvenido(a) '.$this->auth->user()->username);

        }
        else {

            return redirect()->back()
                ->with('message','Usuario o contraseña incorrecta')                
                ->with('status', 'danger')
                ->withInput();
        }

    }

}