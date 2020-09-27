@extends('layouts.app')

@section('content')
<div class="topicCreatePage">
  <div class="container">
    <div class="topic_create col-md-6 offset-md-3">
      <div class="card">
        <div class="card-header topic_create_header">
          トピックを作成する
        </div>
        <div class="card-body topic_create_body">
          @include('common.errors')
          <form action="{{ route('topic.create') }}" method="post" class="form">
            @csrf
            <div class="form-group">
              <input class="form-control" id="title" name="title" type="text" placeholder="タイトルを入力してください" value="{{ old('title') }}">
            </div>
            <div class="form-group">
              <textarea name="content" id="" cols="30" rows="10" placeholder="本文を書いてください">{{ old('content') }}</textarea>
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-primary">投稿する</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

    
@endsection