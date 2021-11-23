@extends('admin.include.layout')

@section('container')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">@yield('page_title','Category')</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
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

<form method="POST"  action="{{route('category.store')}}">
  @csrf
  @method('POST')
<div class="form-group">
    <label class="col-md-4 control-label" for="name">
      <span>
        @error('name')
          {{$message}}
        @enderror
      </span>
      CATEGORY</label>  
    <div class="col-md-4">
    <input  name="name" placeholder="CATEGORY NAME" class="form-control input-md" required="" type="text">
      
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" >
      <span>
        @error('slug')
          {{$message}}
        @enderror
      </span>
      SLUG</label>  
    <div class="col-md-4">
    <input id="product_name" name="slug" placeholder="SLUG" class="form-control input-md" required="" type="text">
      
    </div>
  </div>
  



<!-- Button -->
<div class="form-group">
    
    <div class="col-md-4">
      <button type="submit" name="singlebutton" class="btn btn-primary">Insert</button>
    </div>
    </div>
    {{session('message')}}
    
</form>
 
@endsection