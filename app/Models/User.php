<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Models\Role;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ici_users';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function roles()
    {
        //return $this->belongsTo('App\Models\Role');
        return Role::where('id','=',$this->role_id)->first();
    }

    public function hasRole($name)
    {
        /*
        foreach($this->roles as $role)
        {
            if($role->name == $name) return true;
        }*/
        if($this->roles()->name == $name) return true;
        

        return false;
    }

    public function roleId()
    {        
        return $this->role_id;     
    }

    public function social()
    {
        return $this->hasMany('App\Models\Social');
    }

    public function homeUrl()
    {
        return route('home');
    }
}
