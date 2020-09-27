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
          <a href="{{ route('topic.show',['id'=>$topic->id]) }}" class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between">
              <p>{{ App\Service\Getsum::getTopicCount($topic->id) }}件のコメント</p>
              <small>{{ $topic->created_at }}</small>
            </div>
            <h2>{{ $topic->title }}</h2>
          </a>
          @if($topic->user_id==Auth::user()->id)
          <div class="text-right">
            <a href="{{ route('topic.destroy',['id'=>$topic->id]) }}">削除</a>
          </div>
          @endif
          @endforeach
        </ul>
        <div class="d-flex justify-content-center">
          {{ $topics->links() }}
        </div>
      </div>
      
      <div class="offset-md-1 col-md-2 mt-5">
        <a href="{{ route('topic.create') }}" class="btn btn-info">トピックを投稿する</a>
      </div>
    </div>
  </div>
</div>
    
@endsection