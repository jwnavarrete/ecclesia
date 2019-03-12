<?php namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role;
use App\Models\Iglesia;
use App\Models\Catalogo;
use App\Models\Cursos;
use App\Models\usuario_x_curso;
use App\Models\tutores;
use App\Models\Compassion_child;
use App\Models\HomeCard;
use App\Models\Compassion_Grupos;


class Lista extends Model
{
    

    public function getIglesia()
    {        
        return Iglesia::pluck('nombre', 'id');        
    }

    public function getPaises()
    {        
        return Catalogo::where('data', 'P')->where('estado', 'A')->pluck('nombre', 'id');        
    }

    public function getCiudades()
    {        
        return Catalogo::where('data', 'C')->where('estado', 'A')->pluck('nombre', 'id');        
    }

    public function getRoles()
    {        
        return Role::pluck('name', 'id');        
    }

    public function getCursos()
    {        
        return Cursos::pluck('titulo', 'id');        
    }

    public static function countUser(){
        return User::count();  
    } 

    public static function countCursos(){
        return Cursos::count();  
    } 
    

    public static function countRoles(){
        return Role::count();  
    } 

    public static function countSuscrito(){
        $usuarioId = auth()->user()->id;        
        return usuario_x_curso::where('usuarioId',$usuarioId)->count();          
    } 
    
    public function getCatalogoByData($data)
    {             
        return Catalogo::where('data', $data)->where('estado', 'A')->orderBy('nombre', 'asc')->get();                
    }

    public function chunkCatalogoByData($data)
    {   
        return Catalogo::where('data', $data)->where('estado', 'A')->get()->chunk(1);  
    }
    
    public function pluckCatalogoByData($data)
    {        
        return Catalogo::where('data', $data)->where('estado', 'A')->pluck('nombre', 'id');        
    }

    public function getOptionsByData($data)
    {        
        return Catalogo::where('data', $data )->where('estado', 'A')->pluck('nombre', 'id');        
    }

    public function getTutores()
    {        
        return tutores::all()->pluck('nombres', 'cedula');        
    }
    
    public function getGrupos()
    {        
        return Compassion_Grupos::all()->pluck('nombre', 'id');        
    }

    
    public static function countChild(){
        return Compassion_child::count();  
    } 
    
    public static function countTutores(){
        return tutores::count();  
    } 

    public static function getCard(){
        $rolId = auth()->user()->roleId();        
        
        $cards = HomeCard::join('ici_home_card_roles', 'ici_home_card.id', '=', 'ici_home_card_roles.idCard')            
            ->join('ici_menu as m', 'm.id', '=','ici_home_card.idMenu')
            ->select('ici_home_card.*','m.slug as url')
            ->where('ici_home_card_roles.idRol', '=', $rolId)
            ->orderBy('ici_home_card_roles.orden', 'asc')
            ->get();

        //return HomeCard::all();  
        return $cards;  
    } 

    
    public static function countByTabla($tabla){          
        if  ($tabla){
            return DB::table($tabla)->count();      
        }else{
            return '';
        }
        
    } 
    
    public static function allChild(){
        return Compassion_child::all();  
    } 
    
    public static function getMaestros(){
        
        return DB::table('ici_users')
            ->join('ici_maestro', 'ici_users.id', '=', 'ici_maestro.userId')                        
            ->select('*')
            ->pluck('a.first_name', 'a.id');
    }
    
    public static function getMenu(){
        
        return DB::table('ici_menu')                              
            ->select('*')
            //->where('parent','>',0)
            ->pluck('a.name', 'a.id');
    }
    
}
