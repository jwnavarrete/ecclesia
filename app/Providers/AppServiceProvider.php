<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use App\Models\Cursos;
use Illuminate\Support\Facades\Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {                 
            if(Auth::check()){
                $menus = Menu::menus();
                //print_r($menus);
                $view->with('menus', $menus);
            }                           
        });

        view()->composer('*', function($view) {                                             
            $arrCursos = Cursos::getCursos();                                
            $view->with('arrCursos', $arrCursos);                                    
        });
    }

    /**
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
