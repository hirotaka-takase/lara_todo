@extends('layouts.app')

@section('content')
<h2 class="h2 text-center mb-5"><a href="{{url('home')}}" class="text-white">{{ $login_user['user']->name."'s TO DO" }}</a></h2>
<form class="mb-5 text-center" method="post" action="/posts/{{$login_user['post']->id}}" >
  @csrf
  @method('put')
  <input type="hidden" name="user_id" value="{{$login_user['user']->id}}"  />
  <div class="form-group">
    <input type="text" name="title" value="{{$login_user['post']->title}}" class="form-control w-75 p-3 mx-auto p-4" aria-describedby="emailHelp" placeholder="Title">
  </div>
  <div class="form-group">
    <input type="text" name="body" value="{{$login_user['post']->body}}" class="form-control w-75 p-3 mx-auto p-4" placeholder="Your To Do">
  </div>
  <button type="submit" class="btn btn-outline-success w-25 p-2">Update</button>
</form>
@endsection
