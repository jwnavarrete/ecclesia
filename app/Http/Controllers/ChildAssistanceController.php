<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChildAssistanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:all');
    }

    public function index(){
     
        return view('pages.compassion.Asistencia.index');
    }

    public function asistencia(){     
        return view('pages.compassion.Asistencia.asistencia');
    }

    
}
