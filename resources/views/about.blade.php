@extends('layouts.app')

@section('content')
<div class="text-center card mb-5" style="width: 100%;">
  <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    <p class="card-text">{{ $post->body }}</p>
    <a href="{{url('/home')}}" class="btn btn-primary">Back</a>
  </div>
</div>
@endsection
