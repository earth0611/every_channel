@extends('layouts.app')

@section('content')
  <div class="replyPage">
    <div class="container">
      <div class="col-md-6 offset-md-3">
        <div class="reply_action card">
          <div class="reply_action_header card-header">
            {{ $comment->user->name }}さんに返信する
          </div>
          <div class="reply_action_body card-body">
            <form action="{{ route('reply.create',['id'=>$id]) }}" class="form" method="post">
              @csrf
              <textarea name="content" id="" cols="50" rows="3" placeholder=">>">{{ old('content') }}</textarea>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">返信する</button>
              </div>
            </form>
          </div>
        </div>
        <div class="reply_show">
          <ul class="list-group">
            @foreach($replies as $reply)
            <li class="list-group-item">
              <small>{{ $reply->user->name }}:{{ $reply->created_at }}</small>
              <div class="reply_show_content">{{ $reply->reply_content }}</div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection