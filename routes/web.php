<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\about;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\blog;
use App\Http\Controllers\cart;
use App\Http\Controllers\checkout;
use App\Http\Controllers\contact;
use App\Http\Controllers\shop;
use App\Http\Controllers\users;
use App\Http\Controllers\dashboard;
// ADMIN PANEL CONTROLLERS
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\CouponController;

use App\Models\Category;
use App\Models\Size;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\Product;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('frontend.index');
});

Route::get('/users', function(){
    return view('users-view');
});
Route::get('/signup',[users::class, 'index']);
Route::post('/signup',[users::class, 'register']);
Route::get('/about',[about::class, 'index']);
Route::get('/contact',[contact::class, 'index']);
Route::get('/blog',[blog::class, 'index']);
Route::get('/shop',[shop::class, 'index']);
Route::get('/checkout',[checkout::class, 'index']);

//   ADMIN SECTION ROUTES
Route::group(['middleware'=>'AdminAuth'], function(){


    // LOGIN SECTION
    Route::get('/admin/login',[AdminController::class,'index']);
    Route::get('/dashboard',[AdminController::class, 'dashboard']);    
    Route::post('/admin/auth',[AdminController::class, 'AdminAuth'])->name('admin.auth');
                           
    Route::resource('category',Categorycontroller::class);
    Route::resource('category/delete',[Categorycontroller::class, 'destroy']);

    Route::resource('product',ProductController::class); 
    Route::resource('color',ColorController::class);                         
    Route::resource('size',SizeController::class);
    Route::resource('coupon',CouponController::class);
        
   //  Route::get('/Sub-Category',[SubCategroController::class, 'index']);
});    





//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
