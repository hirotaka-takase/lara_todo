@extends('layouts.app')

@section('content')
<h2 class="h2 text-center mb-5"><a href="{{url('home')}}" class="text-white">{{ $login_user['user']->name."'s TO DO" }}</a></h2>
<form class="mb-5 text-center" method="post" action="{{url('/home')}}" >
  @csrf
  <input type="hidden" name="user_id" value="{{$login_user['user']->id}}"  />
  <div class="form-group">
    @if( $errors->has('title') )
      <p style="color: #fff">{{ $errors->first('title') }}</p>
    @endif
    <input type="text" name="title" class="form-control w-75 p-3 mx-auto p-4" aria-describedby="emailHelp" placeholder="Title">
  </div>
  <div class="form-group">
    @if( $errors->has('body') )
      <p style="color: #fff">{{ $errors->first('body') }}</p>
    @endif
    <input type="text" name="body" class="form-control w-75 p-3 mx-auto p-4" placeholder="Your To Do">
  </div>
  <button type="submit" class="btn btn-outline-success w-25 p-2">Add</button>
</form>
@if(!count($login_user['posts']) == 0)
  <div class="main_container mb-3" id="list_todo">
    @foreach($login_user['posts'] as $post)
    <div class="card m-2" style="width: 18rem;">
      <div class="card-body">
        <a href="/posts/{{$post->id}}" class="btn btn-outline-primary">Detail</a>
        <h5 class="card-title mt-3">{{ $post->title }}</h5>
      </div>
    </div>
    @endforeach
  </div>
  <div class="main_container_link">{{$login_user['posts']->links()}}</div>
@else
  <p class="h2 text-center text-white">You have't posted anything yet</p>
@endif
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="{{ asset('js/Sortable/Sortable.min.js') }}"></script>
<script>
jQuery(function(){

  Sortable.create($('#list_todo')[0], {
    animation: 110  // ミリ秒で指定
  });

});
</script>
