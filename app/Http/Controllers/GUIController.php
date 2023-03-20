<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GUIController extends Controller
{
    public function GetIndex(){
        return view('GUI/index');
    }
}
