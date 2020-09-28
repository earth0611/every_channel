@extends('layouts.app')

@section('content')

<div class="commentCreatePage">
  <div class="container">
    <div class="comment_create col-md-6 offset-md-3">
      <div class="card">
        <div class="card-header comment_create_header">
          <i class="fas fa-theater-masks"></i>
          コメントを投稿する
        </div>
        <div class="card-body comment_create_body">
          @include('common.errors')
          <form action="{{ route('comment.create',['id'=>$id]) }}" class="form " method="post">
            @csrf

            <div class="form-group">
              <textarea name="comment" id="" cols="50" rows="3" placeholder="コメントを記入してください">{{ old('comment') }}</textarea>
            </div>
            <div class="d-flex justify-content-between">
              <button type="button" onclick="history.back()" class="btn btn-primary">戻る</button>
              <button type="submit" class="btn btn-primary">投稿する</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection