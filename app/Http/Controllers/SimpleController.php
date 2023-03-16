<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimpleController extends Controller
{
    //
    public function view(){
        return view('secondView');
    }

    public function viewData(){
        $variable = "Hello World 2";
        return view('thirdView')->with('variable', $variable);
    }
}
