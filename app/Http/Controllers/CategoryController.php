<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.add-category');
    }
    

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
          'category_name' => 'required|min:3|max:10|unique:categories,category_name',    
          
        ]);

        $category = new Category;
        $category->category_name= $request['category_name'];
        $category->slug = $request['slug'];
        $category->status = 1;
        $category->save();
        $request->session()->flash('message','inserted category successfully');
        return redirect()->back();
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    { 
        $categories = Category::all();
        $data = compact('categories');  
        return view('admin.category.show-category')->with($data);       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
   public function status(Request $request, $status, $id)
   { 
       $category = Category::find($id);
       $category->status=$status;
       $category->save();
         
      $category->session()->flash('status','status updated successfully');
      return redirect()->back();

   }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
        
      $req = Category::find($id);
        
      $data =  compact('req');
      return view('admin.category.update-category')->with($data);    
  }
    public function update(Request $request,$id){
      $category = Category::find($id);
         
      $category->category_name= $request['category_name'];
      $category->slug = $request['slug'];
      $category->status = 1;
      $category->save();
      $request->session()->flash('message','Updated category successfully');
      return redirect()->back();
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
     Category::find($id)->delete();
     
     return redirect()->back();
    }
}
