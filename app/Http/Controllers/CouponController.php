<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;


class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.coupon.add-coupon');
    }
    

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $coupon
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
          'title' => 'required|unique:coupons,title',
          'code' => 'required|unique:coupons,code',
          'value' => 'required',    
          
        ]);

        $coupon = new Coupon;
        $coupon->title= $request['title'];
        
        $coupon->code = $request['code'];
        $coupon->code = $request['value'];
        $coupon->status = 1;
        $coupon->save();
        $request->session()->flash('message','inserted Coupon successfully');
        return redirect()->back();
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $Coupon
     * @return \Illuminate\Http\Response
     */
    public function show()
    { 
        $coupons = Coupon::all();
        $data = compact('coupons');  
        return view('admin.coupon.show-coupon')->with($data);       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
     public function status(Request $request, $status, $id)
     { 
         $coupon = Coupon::find($id);
         $coupon->status=$status;
         $coupon->save();
         
        $request->session()->flash('status','coupon updated successfully');
        return redirect()->back();

     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $req = Coupon::find($id);
        
        $data =  compact('req');
        return view('admin.coupon.update-coupon')->with($data);    
    }
      public function update(Request $request,$status,$id){
        $coupon = Coupon::find($id);
         
        $coupon->title = $request['title'];
        $coupon->code = $request['code'];
        $coupon->value = $request['value'];
        $coupon->status = 1;
        $coupon->save();
        $request->session()->flash('message','Updated Coupon successfully');
        return redirect()->back();
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
     $res =  Coupon::find($id)->delete();
       if($res){
      return redirect()->back();
    }
    else {
      return view('admin.coupon.add-coupon');
    }

   }

}