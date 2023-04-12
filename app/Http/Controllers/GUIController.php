<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\PrepareActions;

class GUIController extends Controller
{
    
    
    public function GetIndex(Request $request, $page){
        $isLoggedInUser = session('isLogggedIn');

        if( $isLoggedInUser == "true" ){

            if($page == 'articles'){ $posts = Article::all();}
            else if( $page == 'gallery'){ $posts = Gallery::all();}
            else if( $page == 'preparedActions'){ $posts = PrepareActions::all();}
            else { $posts = null;}

            
            

            return view('GUI/index')->with('postsCount', count($posts))->with('posts', $posts)
            ->with('activePage', $page);
        }

        return view('GUI/loggedOut');
        
    }
}
