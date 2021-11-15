<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cart extends Controller
{
    public function index(){
        return view('frontend.cart');
    }
}
