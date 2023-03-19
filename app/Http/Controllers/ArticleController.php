<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function GetLastFiveArticles(){
        $numberOfRecords = Article::count();
        $lastRecordId = Article::latest()->value('id');
        if($numberOfRecords > 5){
            $articles = Article::where('id','>', $lastRecordId - 5  )->get();
        }else{
            $articles = Article::all();
        }

        $view = view('index');        
        $view ->with('articlesCount', count($articles))->with('articles', $articles);
        return $view;
    }
}
