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

            


            return redirect('/GUI-index/gallery');

        }

        return view('GUI/loggedOut');  
    
    }

    public function DeleteGallery(Request $request){
        
        
        $isLoggedInUser = session('isLogggedIn');

        if( $isLoggedInUser == "true" ){
        
            $gallery = Gallery::find($request->input('post_id'));
            
            if( $gallery ){
                $imagePath1 = Str::replace('storage', '', $gallery->imgPath1); 
                $imagePath2 = Str::replace('storage', '', $gallery->imgPath2);
                $imagePath3 = Str::replace('storage', '', $gallery->imgPath3);
                $imagePath4 = Str::replace('storage', '', $gallery->imgPath4);
                $imagePath5 = Str::replace('storage', '', $gallery->imgPath5);
                $imagePath6 = Str::replace('storage', '', $gallery->imgPath6);
                $imagePath7 = Str::replace('storage', '', $gallery->imgPath7);
                $imagePath8 = Str::replace('storage', '', $gallery->imgPath8); 
                
                

                if (Storage::disk('public')->exists($imagePath1)) 
                {
                    //dd($imagePath1);
                    Storage::disk('public')->delete($imagePath1);
                }
                if (Storage::disk('public')->exists($imagePath2)) {Storage::disk('public')->delete($imagePath2);}
                if (Storage::disk('public')->exists($imagePath3)) {Storage::disk('public')->delete($imagePath3);}
                if (Storage::disk('public')->exists($imagePath4)) {Storage::disk('public')->delete($imagePath4);}
                if (Storage::disk('public')->exists($imagePath5)) {Storage::disk('public')->delete($imagePath5);}
                if (Storage::disk('public')->exists($imagePath6)) {Storage::disk('public')->delete($imagePath6);}
                if (Storage::disk('public')->exists($imagePath7)) {Storage::disk('public')->delete($imagePath7);}
                if (Storage::disk('public')->exists($imagePath8)) {Storage::disk('public')->delete($imagePath8);}

                $gallery->delete();
            }
            
            return redirect('/GUI-index/gallery');
        }

        return view('GUI/loggedOut');       
    }

    public function EditGallery(Request $request, $id){
        
        $isLoggedInUser = session('isLogggedIn');

        if( $isLoggedInUser == "true" ){
        
            $gallery = Gallery::find($id);
            
            if( $gallery ){
                $view = view('GUI/edit-gallery');
                $view-> with('gallery', $gallery);
                $imagePath1 = Str::replace('storage', '', $gallery->imgPath1);  
                $imagePath2 = Str::replace('storage', '', $gallery->imgPath2); 
                $imagePath3 = Str::replace('storage', '', $gallery->imgPath3); 
                $imagePath4 = Str::replace('storage', '', $gallery->imgPath4); 
                $imagePath5 = Str::replace('storage', '', $gallery->imgPath5); 
                $imagePath6 = Str::replace('storage', '', $gallery->imgPath6); 
                $imagePath7 = Str::replace('storage', '', $gallery->imgPath7); 
                $imagePath8 = Str::replace('storage', '', $gallery->imgPath8); 
                //image 1
                if (Storage::disk('public')->exists($imagePath1)) {
                    $view-> with('hasImage1', true) -> with('viewImagePath1', $gallery->imgPath1)-> with('storeImagePath1', $imagePath1);                    
                }else{
                    $view-> with('hasImage1', false);
                }
                //image 2
                if (Storage::disk('public')->exists($imagePath2)) {
                    $view-> with('hasImage2', true) -> with('viewImagePath2', $gallery->imgPath2)-> with('storeImagePath2', $imagePath2);                    
                }else{
                    $view-> with('hasImage2', false);
                }
                //image 3
                if (Storage::disk('public')->exists($imagePath3)) {
                    $view-> with('hasImage3', true) -> with('viewImagePath3', $gallery->imgPath3)-> with('storeImagePath3', $imagePath3);                    
                }else{
                    $view-> with('hasImage3', false);
                }
                //image 4
                if (Storage::disk('public')->exists($imagePath4)) {
                    $view-> with('hasImage4', true) -> with('viewImagePath4', $gallery->imgPath4)-> with('storeImagePath4', $imagePath4);                    
                }else{
                    $view-> with('hasImage4', false);
                }
                //image 5
                if (Storage::disk('public')->exists($imagePath5)) {
                    $view-> with('hasImage5', true) -> with('viewImagePath5', $gallery->imgPath5)-> with('storeImagePath5', $imagePath5);                    
                }else{
                    $view-> with('hasImage5', false);
                }
                //image 6
                if (Storage::disk('public')->exists($imagePath6)) {
                    $view-> with('hasImage6', true) -> with('viewImagePath6', $gallery->imgPath6)-> with('storeImagePath6', $imagePath6);                    
                }else{
                    $view-> with('hasImage6', false);
                }
                //image 7
                if (Storage::disk('public')->exists($imagePath7)) {
                    $view-> with('hasImage7', true) -> with('viewImagePath7', $gallery->imgPath7)-> with('storeImagePath7', $imagePath7);                    
                }else{
                    $view-> with('hasImage7', false);
                }
                //image 8
                if (Storage::disk('public')->exists($imagePath8)) {
                    $view-> with('hasImage8', true) -> with('viewImagePath8', $gallery->imgPath8)-> with('storeImagePath8', $imagePath8);                    
                }else{
                    $view-> with('hasImage8', false);
                }
        
                return $view;
            }else{
                return redirect('/GUI-index/gallery');
            }
        }

        return view('GUI/loggedOut');       
    }

    public function SubmitEditGallery(Request $request, $id){
        $isLoggedInUser = session('isLogggedIn');
        
        if( $isLoggedInUser == "true" ){
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3',
                'image1' => 'file|mimes:jpg',
                'image2' => 'file|mimes:jpg',
                'image3' => 'file|mimes:jpg',
                'image4' => 'file|mimes:jpg',
                'image5' => 'file|mimes:jpg',
                'image6' => 'file|mimes:jpg',
                'image7' => 'file|mimes:jpg',
                'image8' => 'file|mimes:jpg',
            ]);
        
            if ($validator->fails()) {
                return redirect('/edit-gallery/'.$id)
                    ->withErrors($validator)
                    ->withInput();
            }
            
            $name = $request->input('name');
            $storedImgPath1 = $request->input('storedImage1') == null? 'none': $request->input('storedImage1');
            $storedImgPath2 = $request->input('storedImage2') == null? 'none': $request->input('storedImage2');
            $storedImgPath3 = $request->input('storedImage3') == null? 'none': $request->input('storedImage3');
            $storedImgPath4 = $request->input('storedImage4') == null? 'none': $request->input('storedImage4');
            $storedImgPath5 = $request->input('storedImage5') == null? 'none': $request->input('storedImage5');
            $storedImgPath6 = $request->input('storedImage6') == null? 'none': $request->input('storedImage6');
            $storedImgPath7 = $request->input('storedImage7') == null? 'none': $request->input('storedImage7');
            $storedImgPath8 = $request->input('storedImage8') == null? 'none': $request->input('storedImage8');

            $galleryInDB = Gallery::find($id);
            if($galleryInDB){
                if( $request->hasFile('image1') ){
                    $imagePath = $request->file('image1')->store('public/images');
                    $imagePath = Str::replace('public', 'storage', $imagePath);
                    $galleryInDB->imgPath1 = $imagePath;
                    if (Storage::disk('public')->exists($storedImgPath1)) {Storage::disk('public')->delete($storedImgPath1);}
                }
                if( $request->hasFile('image2') ){
                    $imagePath = $request->file('image2')->store('public/images');
                    $imagePath = Str::replace('public', 'storage', $imagePath);
                    $galleryInDB->imgPath2 = $imagePath;
                    if (Storage::disk('public')->exists($storedImgPath2)) {Storage::disk('public')->delete($storedImgPath2);}
                }
                if( $request->hasFile('image3') ){
                    $imagePath = $request->file('image3')->store('public/images');
                    $imagePath = Str::replace('public', 'storage', $imagePath);
                    $galleryInDB->imgPath3 = $imagePath;
                    if (Storage::disk('public')->exists($storedImgPath3)) {Storage::disk('public')->delete($storedImgPath3);}
                }
                if( $request->hasFile('image4') ){
                    $imagePath = $request->file('image4')->store('public/images');
                    $imagePath = Str::replace('public', 'storage', $imagePath);
                    $galleryInDB->imgPath4 = $imagePath;
                    if (Storage::disk('public')->exists($storedImgPath4)) {Storage::disk('public')->delete($storedImgPath4);}
                }
                if( $request->hasFile('image5') ){
                    $imagePath = $request->file('image5')->store('public/images');
                    $imagePath = Str::replace('public', 'storage', $imagePath);
                    $galleryInDB->imgPath5 = $imagePath;
                    if (Storage::disk('public')->exists($storedImgPath5)) {Storage::disk('public')->delete($storedImgPath5);}
                }
                if( $request->hasFile('image6') ){
                    $imagePath = $request->file('image6')->store('public/images');
                    $imagePath = Str::replace('public', 'storage', $imagePath);
                    $galleryInDB->imgPath6 = $imagePath;
                    if (Storage::disk('public')->exists($storedImgPath6)) {Storage::disk('public')->delete($storedImgPath6);}
                }
                if( $request->hasFile('image7') ){
                    $imagePath = $request->file('image7')->store('public/images');
                    $imagePath = Str::replace('public', 'storage', $imagePath);
                    $galleryInDB->imgPath7 = $imagePath;
                    if (Storage::disk('public')->exists($storedImgPath7)) {Storage::disk('public')->delete($storedImgPath7);}
                }
                if( $request->hasFile('image8') ){
                    $imagePath = $request->file('image8')->store('public/images');
                    $imagePath = Str::replace('public', 'storage', $imagePath);
                    $galleryInDB->imgPath8 = $imagePath;
                    if (Storage::disk('public')->exists($storedImgPath8)) {Storage::disk('public')->delete($storedImgPath8);}
                }

                $galleryInDB->name = $name;            
                $galleryInDB->save();
            }
            return redirect('/GUI-index/gallery');

        }

        return view('GUI/loggedOut');  
    }

    public function GetLastFiveGalleries(){
        $articlesOnOnePage = 5;
        $numberOfRecords = Gallery::count();
        $lastRecordId = Gallery::latest()->value('id');
        if($numberOfRecords > $articlesOnOnePage){
            $gallery = Gallery::latest('created_at')->take($articlesOnOnePage)->get();
        }else{
            $gallery = Gallery::all();
        }

        $numberOfPages = $numberOfRecords / $articlesOnOnePage;
        if($numberOfRecords % $articlesOnOnePage){
            $numberOfPages++;
        }

        $actualPage = 1;

        $view = view('gallery');        
        $view ->with('galleriesCount', count($gallery))->with('galleries', $gallery)->with('pagesCount', $numberOfPages)
        ->with('actualPage', $actualPage);
        return $view;
    }

    public function GetGalleriesOfPage( $id ){
        $galleriesOnOnePage = 5;
        $numberOfRecords = Gallery::count();

        $numberOfPages = intval( $numberOfRecords / $galleriesOnOnePage );
        if($numberOfRecords % $galleriesOnOnePage){
            $numberOfPages++;
        }

        if( $id > $numberOfPages ){ $id = $numberOfPages;}

        if( $id <= 1 ){
            $galleryOffset = 0;
            $actualPage = 1;
        }else{
            $galleryOffset = ($id - 1) * $galleriesOnOnePage;
            $actualPage = $id;
        }
            

        $galleries = Gallery::latest('created_at')->offset($galleryOffset)->limit($galleriesOnOnePage)->get();

        

        

        $view = view('gallery');        
        $view ->with('galleriesCount', count($galleries))->with('galleries', $galleries)->with('pagesCount', $numberOfPages)
        ->with('actualPage', $actualPage);
        return $view;
    }
}
