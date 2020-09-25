<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class TopicController extends Controller
{
    public function index(){
        $topics=Topic::all();

        return view('topics.index',['topics'=>$topics]);
    }

    public function create(){
        return view('topics.create');
    }

    public function store(Request $request){
        $topic=new Topic();

        $topic->title=$request->title;
        $topic->content=$request->content;

        $topic->save();

        return redirect('/');
    }
}
