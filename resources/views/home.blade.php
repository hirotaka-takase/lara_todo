@extends('layouts.app')

@section('content')
<h2 class="h2 text-center mb-5 text-white">{{ $login_user['name']."'s TO DO" }}</h2>
<form class="mb-5 text-center">
  @csrf
  <div class="form-group">
    <input type="text" class="form-control w-75 p-3 mx-auto p-4" aria-describedby="emailHelp" placeholder="Title">
  </div>
  <div class="form-group">
    <input type="text" class="form-control w-75 p-3 mx-auto p-4" placeholder="Your To Do">
  </div>
  <button type="submit" class="btn btn-outline-success w-25 p-2">Add</button>
</form>
@if(!count($login_user['posts']) == 0)
  <div class="main_container">
    @foreach($login_user['posts'] as $post)
    <div class="card mb-5" style="width: 18rem;">
      <div class="card-body">
        <a href="/posts/{{$post->id}}" class="btn btn-outline-primary">Detail</a>
        <h5 class="card-title mt-3">{{ $post->title }}</h5>
      </div>
    </div>
    @endforeach
  </div>
@else
  <p class="h2 text-center text-white">You have't posted anything yet</p>
@endif
@endsection
