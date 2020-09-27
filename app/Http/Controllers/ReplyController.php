<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Validator;
use App\Reply;
use Auth;

class ReplyController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function create(int $id){
        $comment=Comment::find($id);
        $replies=$comment->replies()->get();

        return view('replies.create',['replies'=>$replies,'id'=>$id,'comment'=>$comment]);
    }

    public function store(int $id,Request $request){
        $reply=new Reply();

        $reply->reply_content=$request->content;
        $reply->comment_id=$id;
        $reply->user_id=Auth::user()->id;
        $reply->save();

        return redirect()->route('reply.create',['id'=>$id]);
    }
}
