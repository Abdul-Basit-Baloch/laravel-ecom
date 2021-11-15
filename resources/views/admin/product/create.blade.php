@extends('admin.include.layout')

@section('container')

<form method="post" enctype="multipart/form-data" action="{{route('add.product')}}">
  @csrf
<div class="form-group">
    <label class="col-md-4 control-label" for="name">
      <span>
        @error('name')
          {{$message}}
        @enderror
      </span>
      Product Name</label>  
    <div class="col-md-4">
    <input id="name" name="name" placeholder="Product NAME" class="form-control input-md" required="" type="text">
      
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="product_name">
      <span>
        @error('brand')
          {{$message}}
        @enderror
      </span>
      Brand</label>  
    <div class="col-md-4">
    <input id="brand" name="brand" placeholder="Brand" class="form-control input-md" required="" type="text">
      
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-md-4 control-label" for="product_name">
      <span>
        @error('model')
          {{$message}}
        @enderror
      </span>
      Model</label>  
    <div class="col-md-4">
    <input id="model" name="model" placeholder="model" class="form-control input-md" required="" type="text">
      
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-md-4 control-label" for="product_name">
      <span>
        @error('shorDesc')
          {{$message}}
        @enderror
      </span>
      Short Description</label>  
    <div class="col-md-4">
    <input id="brand" name="shorDesc" placeholder="Short Description" class="form-control input-md" required="" type="text">
      
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-md-4 control-label" for="name">
      <span>
        @error('brand')
          {{$message}}
        @enderror
      </span>
      Description</label>  
    <div class="col-md-4">
    <input id="brand" name="desc" placeholder="Description" class="form-control input-md" required="" type="text">
      
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-md-4 control-label" for="product_name">
      <span>
        @error('keywords')
          {{$message}}
        @enderror
      </span>
      Keywords</label>  
    <div class="col-md-4">
    <input id="brand" name="keywords" placeholder="Keywords" class="form-control input-md" required="" type="text">
      
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-md-4 control-label" for="product_name">
      <span>
        @error('uses')
          {{$message}}
        @enderror
      </span>
      Uses</label>  
    <div class="col-md-4">
    <input id="uses" name="uses" placeholder="Brand" class="form-control input-md" required="" type="text">
      
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-md-4 control-label" for="product_name">
      <span>
        @error('warranty')
          {{$message}}
        @enderror
      </span>
      Warranty</label>  
    <div class="col-md-4">
    <input id="brand" name="warranty" placeholder="Warranty" class="form-control input-md" required="" type="text">
      
    </div>
  </div>
  
  <div class="form-group">
    <label class="#" for="product_name">
      <span>
        @error('image')
          {{$message}}
        @enderror
      </span>
      Image</label>  
    <div class="#">
    <input type="file" id="brand" name="image" placeholder="Brand" class="form-control input-md" required="" type="text">
      
    </div>
  </div>
              <!-- PRODUCT ATTRUBUTES -->
          <div class="container">
          
            <div class="row justify-content-around">
            <div class="col-3">
              <div class="form-group">
                <label class="#" for="product_name">
                  <span>
                    @error('image')
                      {{$message}}
                    @enderror
                  </span>
                  </label>  
                <div class="#">
                  @foreach($categories as $category)
                  <select class="form-control input-md" value="Category">
                 <option value="">{{$category->category_name}}</option>
                 
                </select>
                @endforeach
                </div>
              </div>
            </div>
            <div class="col-3">

             
              <div class="form-group">
                <label class="#" for="product_name">
                  <span>
                    @error('image')
                      {{$message}}
                    @enderror
                  </span>
                  Image</label>  
                <div class="#">
                <input type="#" id="brand" name="image" placeholder="Brand" class="form-control input-md" required="" type="text">
                  
                </div>
              </div>
          

            </div>
            <div class="col-3">
              <div class="form-group">
                <label class="#" for="product_name">
                  <span>
                    @error('image')
                      {{$message}}
                    @enderror
                  </span>
                  Image</label>  
                <div class="#">
                <input type="#" id="brand" name="image" placeholder="Brand" class="form-control input-md" required="" type="text">
                  
                </div>
              </div>
            </div>

            </div>
          
            <div class="row justify-content-around">
              <div class="col-3">Hello</div>
              <div class="col-3">hello</div>
              <div class="col-3">hello</div>
  
          
          </div>  

<!-- Button -->
<div class="form-group">
    <label class="col-md-4 control-label" for="singlebutton">Submit</label>
    <div class="col-md-4">
      <button id="singlebutton" name="singlebutton" class="btn btn-primary">Insert</button>
    </div>
    </div>
</form>
 
@endsection