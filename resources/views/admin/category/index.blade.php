
@extends('admin.include.layout')


@section('container')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          <h1 class="m-0">@yield('page_title','Category')</h1>
        </div><!-- /.col -->
        <div class="col-sm-3">
          <a href="{{route('category.create')}}">
            <button class="btn btn-primary">
             Add
          </button>
          
          
        </div><!-- /.col -->
        
        <div class="col-sm-7">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  
  <div class="content">
    
    <div class="container-fluid">

        <form method="get">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td scope="row">{{$category->id}}</td>
                    <td>{{$category->category_name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>
                      <form method="GET" action="{{route('category.edit',$category)}}">
                      <a href="{{route('category.edit', $category)}}">
                        <button type="submit" class="btn btn-primary">Edit</button></a>
                      </form>
                      <form method="POST" action="{{route('category.destroy',$category)}}">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('category.destroy', $category)}}">
                          <button class="btn btn-danger">Delete</button></a>
                          
                      </form>
                      
                        
                       
                     
                      {{--    @if($category->status==1)
                        <a href="{{url('/status-category/status/0')}}/{{$category->id}}">
                          <button class="badge badge-success">Active</button></a>
                        @elseif($category->status==0)
                        <a href="{{url('/status-category/status/1')}}/{{$category->id}}">
                          <button class="badge badge-danger">Deactive</button></a>
                        @endif    --}}
                    </td>
                </tr>
                {{session('error')}}
                @endforeach
            </tbody>
        </table>
    </form>
@endsection


