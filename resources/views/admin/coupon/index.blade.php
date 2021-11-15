
@extends('admin.include.layout')


@section('container')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
          <h1 class="m-0">@yield('page_title','Category')</h1>
        </div><!-- /.col -->
        <div class="col-sm-3">
          <a href="{{route('add.coupon')}}">
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
                    <th>Title</th>
                    <th>Code</th>
                    <th>Value</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coupons as $coupon)
                <tr>
                    <td scope="row">{{$coupon->id}}</td>
                    <td>{{$coupon->coupon}}</td>
                    <td>{{$coupon->code}}</td>
                    <td>{{$coupon->value}}</td>
                    <td><a href="{{url('/delete-coupon/')}}/{{$coupon->code}}">
                      <button class="btn btn-danger">Delete</button></a>
                         <a href="{{route('update.coupon',['id'=>$coupon->id])}}"><button class="btn btn-primary">Edit</button></a>
                         @if($coupon->status==1)
                        <a href="{{url('/status-coupon/status/0')}}/{{$coupon->id}}"><button class="badge badge-success">Active</button></a>
                        @elseif($coupon->status==0)
                        <a href="{{url('/status-coupon/status/1')}}/{{$coupon->id}}"><button class="badge badge-danger">Deactive</button></a>
                        @endif  
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </form>
@endsection


