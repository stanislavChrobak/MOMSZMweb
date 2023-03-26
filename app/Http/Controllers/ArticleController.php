<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class ArticleController extends Controller
{
    public function GetLastFiveArticles(){
        $numberOfRecords = Article::count();
        $lastRecordId = Article::latest()->value('id');
        if($numberOfRecords > 5){
            //$articles = Article::where('id','>', $lastRecordId - 5  )->get();
            $articles = Article::latest('created_at')->take(5)->get();
        }else{
            $articles = Article::all();
        }

        $view = view('index');        
        $view ->with('articlesCount', count($articles))->with('articles', $articles);
        return $view;
    }

    public function AddArticle(){
        
        $isLoggedInUser = session('isLogggedIn');

        if( $isLoggedInUser == "true" ){
        
            return view('GUI/add-article');
        }

        return view('GUI/loggedOut');       
    }
    public function EditArticle(){
        
        $isLoggedInUser = session('isLogggedIn');

        if( $isLoggedInUser == "true" ){
        
            $name = '';
            $text = '';
            $imagePath = '';

            return view('GUI/add-article');
        }

        return view('GUI/loggedOut');       
    }

    public function DeleteArticle(Request $request){
        
        
        $isLoggedInUser = session('isLogggedIn');

        if( $isLoggedInUser == "true" ){
        
            $article = Article::find($request->input('article_id'));
            
            if( $article ){
                $imagePath = Str::replace('storage', '', $article->imgPath);  
                
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                
                }

                $article->delete();
            }
            
            return redirect()->action('App\Http\Controllers\GUIController@GetIndex');
        }

        return view('GUI/loggedOut');       
    }

    public function SubmitAddArticle( Request $request ){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'text' => 'required|min:3',
            'image' => 'required|file|mimes:jpg',
        ]);
    
        if ($validator->fails()) {
            return redirect('/add-article')
                ->withErrors($validator)
                ->withInput();
        }
        
        $name = $request->input('name');
        $text = $request->input('text');
        $imagePath = $request->file('image')->store('public/images');
        $imagePath = Str::replace('public', 'storage', $imagePath);


        $post = new Article();
        $post->name = $name;
        $post->text = $text;
        $post->imgPath = $imagePath;
        $post->save();


        $articles = Article::all();
        return view('GUI/index')->with('articlesCount', count($articles))->with('articles', $articles);

       
    }
}
