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
          
      return view('admin.category.index',compact('categories'));     
    }
    

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
          'category_name' => 'required|unique:categories,category_name',    
          
        ]);

        $category = new Category;
        $category->category_name= $request['category_name'];
        $category->slug = $request['slug'];
        $category->status = true;
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
   public function status(Request $request, Category $category)
   { 
       $category = Category::find($id);
       $category->status=$status;
       $category->save();
         
      $request->session()->flash('status','status updated successfully');
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
        
      $req = Category::find($category->id);
        
      $data =  compact('req');
      return view('admin.category.update')->with($data);    
  }
    public function update(Request $request){
      dump($id);
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
    public function destroy(Category $category)
    {
      $res=category::where('id', $category->id)->delete();
     if($res)
return back()->with('message', "Data Deledet Succeesfully");
else
return back()->with('error', "Data Deledet Succeesfully");
    }
}
