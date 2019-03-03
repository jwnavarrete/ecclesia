<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use DB;
class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:all');
    }

    public function index()
    {        
        //$menu = Menu::all();
        $menu = Menu::allMenu();        
        //print_r($menu);
        return view('pages.seguridad.menu.index',['menu' => $menu]);
    }

    public function menuOrden(Request $request){
        try {
            
            $i = 0;
            foreach ($request->list as $key => $value) {                                    
                if ($value['item_id']) {                                                
                        $objMenu = Menu::select('*')->where('id','=',$value['item_id'])->first();                     
                        $objMenu->parent = (empty($value['parent_id']) ? 0 :$value['parent_id']);
                        $objMenu->order =$i;                    
                        $objMenu->save();                    
                        $i++;                
                }
            }

            return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0]);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }
        
    }

    public function updateMenu(Request $request){
        try {        

        $Menu = new Menu();                
        $Menu = Menu::where('id', '=', $request->id)->first();
        
        $Menu->name = $request->name; 
        $Menu->icon = $request->icono;         
        $Menu->slug = $request->slug;                 

        $Menu->save();


        return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0]);

        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }        
    }

    public function createMenu(Request $request){
        try {        

        $Menu = new Menu();                        
        $Menu->name = $request->name; 
        $Menu->icon = $request->icono;         
        $Menu->slug = $request->slug;                 
        $Menu->save();

        return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0]);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }        
    }

    public function deleteMenu(Request $request){
        try {        

        
        DB::table('ici_menu')->where('id', '=', $request->id)->delete();

        return response()->json(["message" => "Realizado con Exito!" ,"estado"=>0]);

        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage() ,"estado"=>1]);
        }        
    }

    
}
