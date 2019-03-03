<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SessionController extends Controller
{
    public function createsession(Request $request)
    {
        \Session::put('theme', $request->theme);
        echo "session created";
    }


}
