<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Topic;
use Validator;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Auth;

class TopicController extends Controller
{

    public function __construct(){
        return $this->middleware('auth');
    }
    

    public function index(){
        $topics=Topic::paginate(5);
        
        

        return view('topics.index',['topics'=>$topics,]);
    }

    public function create(){
        return view('topics.create');
    }

    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'title'=>'required|max:255',
            'content'=>'required|max:255',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $topic=new Topic();

        $topic->title=$request->title;
        $topic->content=$request->content;
        $topic->user_id=Auth::user()->id;

        $topic->save();

        return redirect('/');
    }

    public function show(int $id){
        $topic=Topic::find($id);

        $comments=$topic->comments()->get();

        return view('topics.show',['topic'=>$topic,'comments'=>$comments]);
    }

    public function destroy(int $id){
        $topic=Topic::find($id);
        $comments=$topic->comments;
        
        foreach($comments as $comment){
            $replies=$comment->replies;
            
            
            foreach($replies as $reply){
                $reply->delete();
            }
            $comment->delete();
        }
        $topic->delete();

        return redirect('/');

    }
}
