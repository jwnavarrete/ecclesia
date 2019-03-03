<?php

namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Traits\ActivationTrait;
use App\Models\Social;
use App\Models\User;
use App\Models\Role;

class SocialController extends Controller
{

    use ActivationTrait;

    public function getSocialRedirect( $provider )
    {

        $providerKey = Config::get('services.' . $provider);

        if (empty($providerKey)) {

            return view('pages.status')
                ->with('error','No hay tal proveedor');

        }

        return Socialite::driver( $provider )->redirect();

    }

    public function getSocialHandle( $provider )
    {        
        if (Input::get('denied') != '') {

            return redirect()->to('login')
                ->with('status', 'danger')
                ->with('message', 'No compartiste los datos de tu perfil con nuestra aplicación.');

        }        
        $user = Socialite::driver( $provider )->user();
        $foto = $user->avatar;
        $nickname = $user->nickname;
        //print_r($user->avatar);
        //die();
        //print_r($user);
        //die();
        $socialUser = null;

        //Check is this email present
        $userCheck = User::where('email', '=', $user->email)->first();

        $email = $user->email;

        if (!$user->email) {
            $email = 'missing' . str_random(10).'@gmail.com';            
        }

        if (!empty($userCheck)) {
            $socialUser = $userCheck;
        }else {

            $sameSocialId = Social::where('social_id', '=', $user->id)
                ->where('provider', '=', $provider )
                ->first();

            if (empty($sameSocialId)) {

                //There is no combination of this social id and provider, so create new one
                $newSocialUser = new User;
                $newSocialUser->email              = $email;
                $newSocialUser->foto = $foto;
                $newSocialUser->username = $nickname;
                
                
                $name = explode(' ', $user->name);

                if (count($name) >= 1) {
                    $newSocialUser->first_name = $name[0];
                }

                if (count($name) >= 2) {
                    $newSocialUser->last_name = $name[1];
                }

                $role = Role::whereName('user')->first();                

                $newSocialUser->password = bcrypt(str_random(16));
                $newSocialUser->token = str_random(64);
                $newSocialUser->activated = true; //!config('settings.activation');
                $newSocialUser->role_id = $role->id; 
                
                $newSocialUser->save();

                $socialData = new Social;
                $socialData->social_id = $user->id;
                $socialData->provider= $provider;
                $newSocialUser->social()->save($socialData);

                // Add role
                

                $this->initiateEmailActivation($newSocialUser);

                $socialUser = $newSocialUser;

            }
            else {

                //Load this existing social user
                $socialUser = $sameSocialId->user;

            }

        }

        auth()->login($socialUser, true);

        //return abort(500, 'El usuario no tiene ningún rol asignado, el rol es obligatorio! No sembró la base de datos con los roles.');
        
        return redirect()->route('home')
        ->with('status', 'success')            
        ->with('message', 'bienvenido(a) '.$user->name);
    }
}