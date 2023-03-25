<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Article;

class GUIController extends Controller
{
    
    
    public function GetIndex(Request $request){
        $isLoggedInUser = session('isLogggedIn');

        if( $isLoggedInUser == "true" ){

            $articles = Article::all();

            return view('GUI/index')->with('articlesCount', count($articles))->with('articles', $articles);
        }

        return view('GUI/loggedOut');
        
    }
}
