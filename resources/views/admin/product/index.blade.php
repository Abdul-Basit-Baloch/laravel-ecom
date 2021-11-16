
@extends('admin.include.layout')


@section('container')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          <h1 class="m-0">@yield('page_title','Product')</h1>
        </div><!-- /.col -->
        <div class="col-sm-3">
          <a href="{{route('product.create')}}">
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
        <form method="post">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nme</th>
                    <th>Brand</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Image</th>
                    <th>Staus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td scope="row">{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->brand}}</td>
                    <td>{{$product->color}}</td>
                    <td>{{$product->size}}</td>
                    <td>{{$product->image}}</td>
                    {{-- <td>
                        @if($product->status==1)
                    <p class="badge badge-success">Active</p>
                     @elseif($product->status==0) 
                     <p class="badge badge-danger">Deactive</p>
                    @endif
                    </td> --}}
                    
                    <td><a href="{{route('product.destroy',$product)}}"><button class="btn btn-danger">Delete</button></a>
                        <a href="{{route('product.edit',$product)}}"><button class="btn btn-primary">Edit</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
@endsection


