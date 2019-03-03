<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChildMedicalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:all');
    }

    public function index()
    {
     
        return view('pages.compassion.ControlMedico.index');
    }
}
