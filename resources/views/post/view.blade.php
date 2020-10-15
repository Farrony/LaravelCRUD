@extends('template')

@section('page_title')
Create 
@endsection

@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">View Post</h6>
      <a href="{{route('post.index')}}" class="btn btn-danger float-right">Back</a>
    </div>
    <div class="card-body">
        Post Title : {{$post->title}} <br>
        Post Category : {{$post->category->name}} <br>
        Description : {{$post->description}} <br>
    </div>
  </div>
</div>
@endsection