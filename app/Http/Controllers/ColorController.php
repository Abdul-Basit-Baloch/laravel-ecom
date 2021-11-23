<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
        $colors = Color::all();
        $data = compact('colors');  
     
        return view('admin.color.index')->with($data);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $color
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
          'name' => 'required',    
          
        ]);

        $color = new Color;
        $color->color= $request['name'];
        
        $color->save();
        return redirect()->route('color.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show()
    { 
        $colors = Colors::all();
        $data = compact('colors');  
        return view('admin.color.index')->with($data);       
    }

    public function edit(Color $color)
  {
    $colors = Color::find($color->id);
    $data = compact('colors');
    
      return view('admin.color.update')->with($data);    
  }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Color $color)
    {
        $color = Color::find($color->id);
        $color->name= $request['name'];
        
        $color->status = 1;
        $color->save();
        $request->session()->flash('message','Updated color successfully');
        return redirect()->route('color.index');
      
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
     $color->delete();
     return redirect()->route('color.index');
    }}
