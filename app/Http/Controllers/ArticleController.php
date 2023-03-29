<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class ArticleController extends Controller
{
    
    public function ViewArticle( $id ){
        $article = Article::find($id);
        return view('viewArticle')->with('article', $article );
    }

    public function GetLastFiveArticles(){
        $articlesOnOnePage = 5;
        $numberOfRecords = Article::count();
        $lastRecordId = Article::latest()->value('id');
        if($numberOfRecords > $articlesOnOnePage){
            $articles = Article::latest('created_at')->take($articlesOnOnePage)->get();
        }else{
            $articles = Article::all();
        }

        $numberOfPages = $numberOfRecords / $articlesOnOnePage;
        if($numberOfRecords % $articlesOnOnePage){
            $numberOfPages++;
        }

        $actualPage = 1;

        $view = view('index');        
        $view ->with('articlesCount', count($articles))->with('articles', $articles)->with('pagesCount', $numberOfPages)
        ->with('actualPage', $actualPage);
        return $view;
    }

    public function GetArticlesOfPage( $id ){
        $articlesOnOnePage = 5;
        $numberOfRecords = Article::count();

        $numberOfPages = $numberOfRecords / $articlesOnOnePage;
        if($numberOfRecords % $articlesOnOnePage){
            $numberOfPages++;
        }

        if( $id > $numberOfPages ) $id = $numberOfPages;

        if( $id <= 1 ){
            $articleOffset = 0;
            $actualPage = 1;
        }else{
            $articleOffset = ($id - 1) * $articlesOnOnePage;
            $actualPage = $id;
        }
            

        $articles = Article::latest('created_at')->offset($articleOffset)->limit($articlesOnOnePage)->get();

        

        

        $view = view('index');        
        $view ->with('articlesCount', count($articles))->with('articles', $articles)->with('pagesCount', $numberOfPages)
        ->with('actualPage', $actualPage);
        return $view;
    }

    public function AddArticle(){
        
        $isLoggedInUser = session('isLogggedIn');

        if( $isLoggedInUser == "true" ){
        
            return view('GUI/add-article');
        }

        return view('GUI/loggedOut');       
    }
    public function EditArticle(Request $request, $id){
        
        $isLoggedInUser = session('isLogggedIn');

        if( $isLoggedInUser == "true" ){
        
            $article = Article::find($id);
            
            if( $article ){
                $view = view('GUI/edit-article');
                $view-> with('article', $article);
                $imagePath = Str::replace('storage', '', $article->imgPath);  
                
                if (Storage::disk('public')->exists($imagePath)) {
                    $view-> with('hasImage', true) -> with('viewImagePath', $article->imgPath)-> with('storeImagePath', $imagePath);                    
                }else{
                    $view-> with('hasImage', false);
                }

                return $view;
            }else{
                return redirect()->action('App\Http\Controllers\GUIController@GetIndex');
            }
        }

        return view('GUI/loggedOut');       
    }

    public function SubmitEditArticle(Request $request, $id, $imgPath){
        $isLoggedInUser = session('isLogggedIn');
        
        if( $isLoggedInUser == "true" ){
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3',
                'text' => 'required|min:3',
                'image' => 'file|mimes:jpg',
            ]);
        
            if ($validator->fails()) {
                return redirect('/edit-article/'.$id)
                    ->withErrors($validator)
                    ->withInput();
            }
            
            $name = $request->input('name');
            $text = $request->input('text');

            $articleInDB = Article::find($id);
            if($articleInDB){
                if( $request->hasFile('image') ){
                    
                    $imagePath = $request->file('image')->store('public/images');
                    $imagePath = Str::replace('public', 'storage', $imagePath);
                    $articleInDB->imgPath = $imagePath;
                    $imgPath = 'public/images/'.$imgPath;
                    Storage::delete($imgPath);
                }
            }
            
            $articleInDB->name = $name;
            $articleInDB->text = $text;
            
            $articleInDB->save();


            $articles = Article::all();
            return view('GUI/index')->with('articlesCount', count($articles))->with('articles', $articles);

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
        $isLoggedInUser = session('isLogggedIn');

        if( $isLoggedInUser == "true" ){
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

        return view('GUI/loggedOut');  
    }
}
