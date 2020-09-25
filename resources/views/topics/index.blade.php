@extends('layouts.app')

@section('content')
<div class="topPage">
  <div class="container">
    <div class="row">
      <div class="offset-md-2 col-md-6">
        <h1 class="topPage-mb-4">topic</h4>
        <ul class="list-group">
          <h4>{{ date('Y-m-d') }}</h2>
          @foreach ($topics as $topic)  
          <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between">
              <p>ポスト数</p>
              <small>{{ $topic->created_at }}</small>
            </div>
            <h2>{{ $topic->title }}</h2>
          </a>
          <div class="text-right">

            <a href="#">削除</a>
          </div>
          @endforeach
        </ul>
      </div>
      <div class="offset-md-1 col-md-2 mt-5">
        <a href="{{ route('topic.create') }}" class="btn btn-info">トピックを投稿する</a>
      </div>
    </div>
  </div>
</div>
    
@endsection