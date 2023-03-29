<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Administrator;
use Illuminate\routing\Controller;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


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
        if($existUserName){
            $userDbPassword = Administrator::where('name', $name)->value('password');
            $isCorrectPassword =  Hash::check( $password , $userDbPassword);

        }else{
            $isCorrectPassword = false;
        }
        
        if( $existUserName && $isCorrectPassword ){

            session(['isLogggedIn' => 'true']);

            return redirect()->route('GUI-index', ['id' => 'articles']);
        }else{
            return redirect('/login')->withErrors("Bad parameters")->withInput();
        }

    }

    public function UserLogout(Request $request){
        session()->forget('isLogggedIn');
        return view('GUI/loggedOut');
    }
}
