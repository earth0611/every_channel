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
          <a href="{{ route('comment.create',['id'=>$topic->id]) }}" class="btn btn-primary">コメントを投稿する</a>
        </div>
        <div class="card-body topic_body">
          {{ $topic->content }}
        </div>
      </div>
      <ul class="list-group comment">
        @foreach ($comments as $comment)
            <li class="list-group-item ">
              <div class="comment_user">{{ $comment->user->name }}:{{ $comment->created_at }}</div>
              <div class="d-flex justify-content-between">
                <div class="comment_content">{{ $comment->comment }}</div>
                <a href="{{ route('reply.create',['id'=>$comment->id]) }}" class="list-group-action">返信する</a>
              </div>
              <div class="d-flex justify-content-between">
                <a href="{{ route('reply.create',['id'=>$comment->id]) }}">{{ App\Service\Getsum::getCommentCount($comment->id) }}件の返信</a>
                @if($comment->user_id==Auth::user()->id)
                <a href="{{ route('comment.destroy',['id'=>$comment->id]) }}">削除</a>
                @endif
              </div>
            </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>



@endsection