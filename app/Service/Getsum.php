<?php

namespace App\Service;

use App\Comment;
use App\Reply;

class Getsum
{
  public static function getTopicCount($topic){

    $comments=Comment::where('topic_id',$topic)->get();
        $comment_sum=count($comments);

        return $comment_sum;
  }

  public static function getCommentCount($comment){
    $replies=Reply::where('comment_id',$comment)->get();
    $replies_sum=count($replies);

    return $replies_sum;
  }
}