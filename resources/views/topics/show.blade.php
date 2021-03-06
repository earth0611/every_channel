@extends('layouts.app')

@section('content')
<div class="showPage">
  <div class="container">
    <div class="col-md-6 offset-md-3">
      <div class="card topic">
        <div class="card-header topic_header d-flex justify-content-between">
          <div class="topic_header_titile">
            {{ $topic->title }}
          </div>
          <a href="{{ route('comment.create',['id'=>$topic->id]) }}" class="btn btn-primary topic_header_btn">コメントを投稿する</a>
        </div>
        <div class="card-body topic_body">
          {{ $topic->content }}
        </div>
      </div>
      <ul class="list-group comment">
        @foreach ($comments as $comment)
            <li class="list-group-item ">
              <div class="comment_user">{{ $comment->user->name }}:{{ $comment->created_at }}</div>
              <div class="d-flex justify-content-between comment_content">
                <div class="">{{ $comment->comment }}</div>
                <a href="{{ route('reply.create',['id'=>$comment->id]) }}" class="list-group-action"><i class="fas fa-reply"></i>返信する</a>
              </div>
              <div class="d-flex justify-content-between">
                <a href="{{ route('reply.create',['id'=>$comment->id]) }}"><i class="fas fa-comment"></i>{{ App\Service\Getsum::getCommentCount($comment->id) }}件の返信</a>
                @if($comment->user_id==Auth::user()->id)
                <a href="{{ route('comment.destroy',['id'=>$comment->id]) }}" onclick="confirm('本当に削除しますか？')"><i class="fas fa-trash-alt"></i>削除</a>
                @endif
              </div>
            </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>



@endsection