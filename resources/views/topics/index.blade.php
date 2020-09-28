@extends('layouts.app')

@section('content')
<div class="topPage">
  <div class="container">
    <div class="row">
      <div class="offset-md-2 col-md-6">
        <div class="top_title">
          <h1>topic</h1>
          <h4>{{ date('Y-m-d') }}</h4>
         </div>

        <ul class="list-group topic">
          @foreach ($topics as $topic)  
          <a href="{{ route('topic.show',['id'=>$topic->id]) }}" class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between">
              <p class="topic_title">{{ App\Service\Getsum::getTopicCount($topic->id) }}件のコメント</p>
              <small class="topic_date">{{ $topic->created_at }}</small>
            </div>
            <h2>{{ $topic->title }}</h2>
          </a>
          @if($topic->user_id==Auth::user()->id)
          <div class="text-right">
            <a onclick="confirm('本当に削除しますか？')" href="{{ route('topic.destroy',['id'=>$topic->id]) }}"><i class="fas fa-trash-alt"></i>削除</a>
          </div>
          @else
           <div class="mb-4"></div>
          @endif
          @endforeach
        </ul>
        <div class="d-flex justify-content-center">
          {{ $topics->links() }}
        </div>
      </div>
      
      <div class="offset-md-1 col-md-2 mt-5">
        <a href="{{ route('topic.create') }}" class="btn btn-info topic_header_btn">トピックを投稿する</a>
      </div>
    </div>
  </div>
</div>
    
@endsection