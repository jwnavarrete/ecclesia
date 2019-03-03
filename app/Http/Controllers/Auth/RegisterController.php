<?php

namespace App\Http\Controllers\Auth;

use App\Traits\CaptchaTrait;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Traits\ActivationTrait;
use App\Models\User;
use App\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, ActivationTrait, CaptchaTrait;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        //$data['captcha'] = $this->captchaCheck();     
        $validator = Validator::make($data,
            [
                'first_name'            => 'required',
                'last_name'             => 'required',
                'email'                 => 'required|email|unique:ici_users',
                'password'              => 'required|min:6|max:20',
                'password_confirmation' => 'required|same:password',
                //'g-recaptcha-response'  => 'required',
                //'captcha'               => 'required|min:1'
            ],
            [
                'first_name.required'   => 'Nombre es obligatorio',
                'last_name.required'    => 'Apellido es obligatorio',
                'email.required'        => 'Email es obligatorio',
                'email.email'           => 'Email invalido',
                'password.required'     => 'Contraseña es obligatoria',
                'password.min'          => 'La contraseña debe tener al menos 6 caracteres',
                'password.max'          => 'La longitud máxima de la contraseña es de 20 caracteres',
                //'g-recaptcha-response.required' => 'Captcha es obligatorio',
                //'captcha.min'           => 'Captcha incorrecto, por favor intente de nuevo.'
            ]
        );

        return $validator;

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $role = Role::whereName('user')->first();
        
        $user =  User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'token' => str_random(64),
            'activated' => !config('settings.activation'),
            'role_id'=>$role->id
        ]);

        

        $this->initiateEmailActivation($user);

        return $user;

    }

}