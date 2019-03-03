<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class ReporteController extends Controller{

    public function __construct(){
        $this->middleware('guest');
    }


    public function child_report($id){
        $role = Role::find($id);        
        return view('pages.reporteria.child.childReport', compact('role'));
    }




}
