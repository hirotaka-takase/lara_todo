@extends('layouts.app')

@section('content')
<div class="text-center card mb-5" style="width: 100%;">
  <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    <p class="card-text">{{ $post->body }}</p>
    <a href="{{url('/home')}}" class="btn btn-primary m-2">Back</a>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary m-2">Edit</a>
    <form method="post" action="/posts/{{$post->id}}" class="mt-1 mb-1">
      @csrf
      @method('delete')
      <input type="hidden" value="{{$post->id}}" />
      <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
</div>
@endsection
