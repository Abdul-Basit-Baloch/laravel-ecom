@extends('admin.include.layout')

@section('container')

<form method="post" action="{{route('color.store')}}">
  @csrf
<div class="form-group">
    <label class="col-md-4 control-label" for="ame">
      <span>
        @error('name')
          {{$message}}
        @enderror
      </span>
      Color</label>  
    <div class="col-md-4">
    <input id="color" name="name" placeholder="Color" class="form-control input-md" required="" type="text">
      
    </div>
  </div>
<!-- Button -->
<div class="form-group">
    <label class="col-md-4 control-label" for="singlebutton">Submit</label>
    <div class="col-md-4">
      <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Button</button>
    </div>
    </div>
    {{session('message')}}
</form>
 
@endsection