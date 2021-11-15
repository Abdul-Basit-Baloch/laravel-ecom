@extends('admin.include.layout')

@section('container')

<form method="post" action="{{route('add.color')}}">
  @csrf
<div class="form-group">
    <label class="col-md-4 control-label" for="product_name">
      <span>
        @error('name')
          {{$message}}
        @enderror
      </span>
      Color</label>  
    <div class="col-md-4">
    <input id="product_name" name="name" placeholder="Size" class="form-control input-md" required="" type="text">
      
    </div>
  </div>
<!-- Button -->
<div class="form-group">
    <label class="col-md-4 control-label" for="singlebutton">Submit</label>
    <div class="col-md-4">
      <button id="singlebutton" name="singlebutton" class="btn btn-primary">Button</button>
    </div>
    </div>
</form>
 
@endsection