<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;


class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
      $sizes = Size::all();
      $data = compact('sizes');  
      return view('admin.size.index')->with($data); 
    }
    

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
          'name' => 'required',    
          
        ]);

        $size = new Size;
        $size->size = $request['name'];
        
        $size->status = 1;
        $size->save();
        $request->session()->flash('message','inserted size successfully');
        return redirect()->route('size.create');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
      return view('admin.size.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
   public function status(Request $request)
   { 
       $size = Size::find($id);
       $size->status=$status;
       $size->save();
         
      $size->session()->flash('status','status updated successfully');
      return redirect()->back();

   }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Size  $size
   * @return \Illuminate\Http\Response
   */
  public function edit(Size $size)
  {
    $size = Size::find($size->id);
    $data = compact('size');
    
      return view('admin.size.update')->with($data);    
  }

    public function update(Size $size,Request $request){
      
      $size = Size::find($size->id);
      $size->size= $request['name'];
      $size->status = 1;
      $size->save();
      $request->session()->flash('message','Updated size successfully');
      return redirect()->route('size.index');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
     $size->delete();
     
     return redirect()->route('size.index');
    }
}
