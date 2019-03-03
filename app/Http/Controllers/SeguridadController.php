<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SeguridadController extends Controller
{
    //    
    public function usuarios()
    {        
        $usuarios = User::all();

        return view('pages.seguridad.usuarios', ['usuarios' => $usuarios]);
    }
}
