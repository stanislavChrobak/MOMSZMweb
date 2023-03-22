<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GUIController extends Controller
{
    
    
    public function GetIndex(){

        return view('GUI/index');
    }
}
