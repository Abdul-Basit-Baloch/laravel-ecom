<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
          'name' => 'required|min:3|max:15',    
          'model' => 'required|min:3|max:15',
          'brand' => 'required|min:3|max:15',
          'shortDesc' => 'required|min:50|max:100',
          'desc' => 'required|min:150|max:300',
          'keywords' => 'required|min:3|max:50',
          'uses' => 'required|min:3|max:15',
          'warranty' => 'min:3|max:15',
          'image' => 'required|mimes:jpeg,jpg',
          

        ]);

        $product = new Product;
        $product->name= $request['name'];
        $product->brand = $request['brand'];
        $product->model= $request['model'];
        $product->shortDesc= $request['short-desc'];
        $product->desc= $request['desc'];
        $product->keweords= $request['keweords'];
        $product->uses= $request['uses'];
        $product->warranty= $request['warranty'];
        $product->image= $request['image'];
        $product->save();
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    { 
        $products = Product::all();
        $data = compact('products');  
        return view('admin.product.index')->with($data);       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
     $product->delete();
     return redirect()->route('product.index');
    }
}
