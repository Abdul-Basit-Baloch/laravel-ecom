@extends('admin.include.layout')

@section('container')

<form method="POST" action="{{route('category.update',$color)}}">
    @csrf
    @method('PUT')
  
<div class="form-group">
    <label class="col-md-4 control-label" for="color_name">
      <span>
        @error('name')
          {{$message}}
        @enderror
      </span>
      Color</label>  
    <div class="col-md-4">
    <input id="color" name="name" placeholder="Color"
    value="{{$color->color}}"
    class="form-control input-md" required="" type="text">
      
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