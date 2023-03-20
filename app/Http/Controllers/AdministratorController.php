<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Administrator;
use Illuminate\routing\Controller;


class AdministratorController extends Controller
{
    public function UserLogin(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'password' => 'required|min:3',
        ]);
    
        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }
        
        $name = $request->input('name');
        $password = $request->input('password');

        $existUserName = Administrator::where('name', $name)->exists();
        $isCorrectPassword = $existUserName? Administrator::where('name', $name)->where('password', $password)->exists() : false;

        if( $existUserName && $isCorrectPassword ){

            $cookieDurationInMin = 60;
            $responseCookie = new Response('UserLogin');
            $responseCookie->withCookie(cookie('isLogggedIn', 'true', $cookieDurationInMin));

            return redirect()->action('App\Http\Controllers\GUIController@GetIndex');
        }else{
            return redirect('/login')->withErrors("Bad parameters")->withInput();
        }

    }
}
