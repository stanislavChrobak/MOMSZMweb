<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PrepareActions;

class PrepareActionsController extends Controller
{
    public function ViewAction( $id ){
        $action = PrepareActions::find($id);
        return view('viewAction')->with('action', $action );
    }

    public function AddPreparedAction(){
        
        $isLoggedInUser = session('isLogggedIn');

        if( $isLoggedInUser == "true" ){
        
            return view('GUI/add-action');
        }

        return view('GUI/loggedOut');       
    }

    public function SubmitAddPrepareAction( Request $request ){
        $isLoggedInUser = session('isLogggedIn');

        if( $isLoggedInUser == "true" ){
            $validator = Validator::make($request->all(), [
                'when' => 'required|min:3',
                'where' => 'required|min:3',
                'note' => 'required|min:3',
            ]);
        
            if ($validator->fails()) {
                return redirect('/add-action')
                    ->withErrors($validator)
                    ->withInput();
            }
            
            $when = $request->input('when');
            $where = $request->input('where');
            $note = $request->input('note');
            $visible = $request->input('visible');


            $post = new PrepareActions();
            $post->when = $when;
            $post->where = $where;
            $post->note = $note;
            $post->visible = $visible == 'true' ? true : false;
            $post->save();


            return redirect('/GUI-index/preparedActions');

        }

        return view('GUI/loggedOut');  
    }
}
