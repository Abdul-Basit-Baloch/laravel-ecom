
@extends('admin.include.layout')


@section('container')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          <h1 class="m-0">@yield('page_title','color')</h1>
        </div><!-- /.col -->
        <div class="col-sm-3">
          <a href="{{route('color.create')}}">
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
                    <th>color</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($colors as $color)
                <tr>
                    <td scope="row">{{$color->id}}</td>
                    <td>{{$color->color}}</td>
                    
                    <td>
                      <form method="GET" action="{{route('color.edit',$color)}}">
                      <a href="{{route('color.edit', $color)}}">
                        <button type="submit" class="btn btn-primary">Edit</button></a>
                      </form>
                      <form method="POST" action="{{route('color.destroy',$color)}}">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('color.destroy', $color)}}">
                          <button class="btn btn-danger">Delete</button></a>
                          
                      </form>
                      
                        
                       
                     
                      {{--    @if($color->status==1)
                        <a href="{{url('/status-color/status/0')}}/{{$color->id}}">
                          <button class="badge badge-success">Active</button></a>
                        @elseif($color->status==0)
                        <a href="{{url('/status-color/status/1')}}/{{$color->id}}">
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


