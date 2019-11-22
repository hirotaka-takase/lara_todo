@extends('layouts.app')

@section('title','TOP')

@section('content')
<div class="text-center p-3">
  <h1 style="color: #fff" class="mb-5">
    This app will <br />
    effect your work easier<br />
    in tremendous way.<br />
    Just sign up and<br />
    manage your <sapn style="color: #f50;">TO DO</sapn><br />
  </h1>
  <a href="{{url('/home')}}" class="btn btn-primary">TO DO page</a>
</div>
@endsection
