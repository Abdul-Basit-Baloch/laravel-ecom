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
     
      $categories = Category::all();
      $data = compact('categories');  
      return view('admin.category.index')->with($data); 
    }
    

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
          'name' => 'required|unique:categories,category',    
          
        ]);

        $category = new Category;
        $category->category= $request['name'];
        $category->slug = $request['slug'];
        $category->status = 1;
        $category->save();
        $request->session()->flash('message','inserted category successfully');
        return redirect()->route('category.create');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
      return view('admin.category.create');
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
  public function edit(Category $category)
  {
    $category = Category::find($category->id);
    $data = compact('category');
    
      return view('admin.category.edit')->with($data);    
  }

    public function update(Category $category,Request $request){
      
      $category = Category::find($category->id);
      $category->category= $request['name'];
      $category->slug = $request['slug'];
      $category->status = 1;
      $category->save();
      $request->session()->flash('message','Updated category successfully');
      return redirect()->route('category.index');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
     $category->delete();
     
     return redirect()->route('category.index');
    }
}
