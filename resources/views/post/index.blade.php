@extends('template')

@section('page_title')
Home
@endsection

@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tables</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">All Post</h6>
      <a href="{{route('post.create')}}" class="btn btn-primary float-right">Add Post</a>
    </div>
    <div class="card-body">
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>                   
      @endif
      @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>                   
      @endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#Sl.</th>
              <th>Title</th>
              <th>Category</th>
              <th>Slug</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#Sl.</th>
              <th>Title</th>
              <th>Category</th>
              <th>Slug</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @php
              $i=1;
            @endphp
            @if(!empty($posts))
              @foreach($posts as $post)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->category->name}}</td>
                  <td>{{$post->slug}}</td>
                  <td>
                    <a href="{{route('post.edit',['post' => $post->id])}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    <a href="{{route('post.show',['post' => $post->id])}}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                    <a onclick="event.preventDefault(); document.getElementById('deleteForm').submit()" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    <form id="deleteForm" action="{{route('post.destroy',['post' => $post->id ])}}" method="POST">
                      @csrf
                      @method('DELETE')
                    </form>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection