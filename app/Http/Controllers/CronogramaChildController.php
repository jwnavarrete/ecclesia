<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cronograma_child;

class CronogramaChildController extends Controller
{
    public function __construct(){
        $this->middleware('auth:all');
    }

    public function index(){     
        return view('pages.compassion.Cronograma.index');
    }

    public function getCronograma(){             
        $calendar = array();
        $calendar = Cronograma_child::all();      

        foreach($calendar as $key => $rows){
            $start = strtotime($rows['start_date']) * 1000;
            $end = strtotime($rows['end_date']) * 1000;
            
            $calendar[] = array(
            'id' =>$rows['id'],
            'title' => $rows['title'],
            'url' => $rows['url'],
            "class" => 'event-important',
            'start' => $start,
            'end' => $end       
            );
        }
        
        $calendarData = array(
            "success" => 1,
            "result"=>$calendar
        );
        return response()->json($calendar);        
    }

    


}
