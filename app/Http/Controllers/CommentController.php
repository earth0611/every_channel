<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Comment;
use Validator;
use Auth;

class CommentController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function create(int $id){

        return view('comments.create',['id'=>$id]);
    }

    public function store(int $id,Request $request){
        $validator=Validator::make($request->all(),[
            'comment'=>'required|min:5',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }


        $topic=Topic::find($id);

        $comment=new Comment();
        $comment->comment=$request->comment;
        $comment->topic_id=$id;
        $comment->user_id=Auth::user()->id;
        $comment->save();

        return redirect()->route('topic.show',['id'=>$id]);
    }

    public function destroy($id){
        $comment=Comment::find($id);
        $comment->replies()->delete();
        $comment->delete();

        return redirect('/');
    }
}
