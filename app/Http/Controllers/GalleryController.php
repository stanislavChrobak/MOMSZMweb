<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function AddGallery(){
        $isLoggedInUser = session('isLogggedIn');

        if( $isLoggedInUser == "true" ){
        
            return view('GUI/add-gallery');
        }

        return view('GUI/loggedOut'); 
    }

    public function SubmitAddGallery( Request $request){
        $isLoggedInUser = session('isLogggedIn');

        if( $isLoggedInUser == "true" ){
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3',
                'image1' => 'required|file|mimes:jpg',
                'image2' => 'file|mimes:jpg',
                'image3' => 'file|mimes:jpg',
                'image4' => 'file|mimes:jpg',
                'image5' => 'file|mimes:jpg',
                'image6' => 'file|mimes:jpg',
                'image7' => 'file|mimes:jpg',
                'image8' => 'file|mimes:jpg',
            ]);
        
            if ($validator->fails()) {
                return redirect('/add-gallery')
                    ->withErrors($validator)
                    ->withInput();
            }
            
            $name = $request->input('name');
            $imagePath1 = Str::replace('public', 'storage', $request->file('image1')->store('public/images'));
            if( $request->hasFile('image2') ){ $imagePath2 = Str::replace('public', 'storage', $request->file('image2')->store('public/images'));}
            else{ $imagePath2='none';}
            if( $request->hasFile('image3') ){$imagePath3 = Str::replace('public', 'storage', $request->file('image3')->store('public/images'));}
            else{ $imagePath3='none';}
            if( $request->hasFile('image4') ){$imagePath4 = Str::replace('public', 'storage', $request->file('image4')->store('public/images'));}
            else{ $imagePath4='none';}
            if( $request->hasFile('image5') ){$imagePath5 = Str::replace('public', 'storage', $request->file('image5')->store('public/images'));}
            else{ $imagePath5='none';}
            if( $request->hasFile('image6') ){$imagePath6 = Str::replace('public', 'storage', $request->file('image6')->store('public/images'));}
            else{ $imagePath6='none';}
            if( $request->hasFile('image7') ){$imagePath7 = Str::replace('public', 'storage', $request->file('image7')->store('public/images'));}
            else{ $imagePath7='none';}
            if( $request->hasFile('image8') ){$imagePath8 = Str::replace('public', 'storage', $request->file('image8')->store('public/images'));}
            else{ $imagePath8='none';}

            $post = new Gallery();
            $post->name = $name;
            $post->imgPath1 = $imagePath1;
            $post->imgPath2 = $imagePath2;
            $post->imgPath3 = $imagePath3;
            $post->imgPath4 = $imagePath4;
            $post->imgPath5 = $imagePath5;
            $post->imgPath6 = $imagePath6;
            $post->imgPath7 = $imagePath7;
            $post->imgPath8 = $imagePath8;
            $post->save();

            


            $galleryPosts = Gallery::all();
            return view('GUI/index')->with('gallerypostsCount', count($galleryPosts))->with('galleryPosts', $galleryPosts);

        }

        return view('GUI/loggedOut');  
    
    }
}
