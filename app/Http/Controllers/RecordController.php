<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordController extends Controller
{
    
    public function index(){
        
        $events= [
            [ 'title' => '背中',
                'start' => '2024-05-31',],
    ];
    
     return view('records.index');
              
    }
        
    
    //
}
