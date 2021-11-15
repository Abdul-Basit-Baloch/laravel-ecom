
@extends('admin.include.layout')


@section('container')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          <h1 class="m-0">@yield('page_title','Size')</h1>
        </div><!-- /.col -->
        <div class="col-sm-3">
          <a href="{{route('add.size')}}">
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
                    <th>Size</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sizes as $size)
                <tr>
                    <td scope="row">{{$size->id}}</td>
                    <td>{{$size->size}}</td>
                    
                    <td><a href="{{route('delete.size',['id'=>$size->id])}}"><button class="btn btn-danger">Delete</button></a>
                        <a href="{{url('update-size/status')}}/{{($size->id)}}"><button class="btn btn-primary">Edit</button></a>
                        @if($size->status==1)
                        <a href="{{url('show-size/status/0')}}/{{$size->id}}"><button class="badge badge-success">Active</button></a>
                        @elseif($size->status==0)
                        <a href="{{url('show-size/status/1')}}/{{$size->id}}"><button class="badge badge-danger">Deactive</button></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
@endsection


