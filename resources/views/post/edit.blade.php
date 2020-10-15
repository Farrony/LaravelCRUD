@extends('template')

@section('page_title')
Create 
@endsection

@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Edit Post</h6>
      <a href="{{route('post.index')}}" class="btn btn-danger float-right">Back</a>
    </div>
    <div class="card-body">
      <form action="{{route('post.update',['post'=>$id])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$post->title}}">
          @error('title')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label>Category</label>
          <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
            <option value="">Select Category</option>
            @if( !empty($categories) )
              @foreach($categories as $category)
                <option @if($post->category_id == $category->id) {{'selected'}}  @endif value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            @endif
          </select>
          @error('category_id')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{$post->description}}</textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success btn-block">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection