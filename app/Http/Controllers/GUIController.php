<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GUIController extends Controller
{
    
    
    public function GetIndex(Request $request){
        $isLoggedInUser = session('isLogggedIn');

        if( $isLoggedInUser == "true" ){
            return view('GUI/index');
        }

        return view('GUI/loggedOut');
        
    }
}
