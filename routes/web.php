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
    Route::get('/forgot-password',[ForgotPassController::class, 'index']);
    Route::post('/forgot-password',[ForgotPassController::class, 'forgot']);
 //  MANAGE CATEGORY                          
    Route::get('/category',[CategoryController::class, 'index'])->name('add.category');
    Route::post('/category',[CategoryController::class, 'store']);
    Route::get('/show-category',[CategoryController::class, 'show'])->name('show.category');
    Route::get('/delete-category/{id}',[CategoryController::class, 'delete'])->name('delete.category');
    Route::get('/update-category/{id}',[CategoryController::class, 'edit'])->name('update.category');
    Route::post('/update-category/{id}',[CategoryController::class, 'update'])->name('update.category');
    Route::get('/status-category/status/{status}/{id}',[CategoryController::class, 'status'])->name('status.category');
    // MANAGE PRODUCT                          
   Route::get('/product',[ProductController::class, 'index'])->name('add.product');
   Route::post('/product',[ProductController::class, 'store']);
   Route::get('/show-product',[ProductController::class, 'show'])->name('show.product');
   Route::get('/delete-product/{id}',[ProductController::class, 'delete']);
   Route::get('/update-product',[ProductController::class, 'update'])->name('update.product');
   //  MANAGE COLOR                          
   Route::get('/color',[ColorController::class, 'index'])->name('add.color');
   Route::post('/color',[ColorController::class, 'store']);
   Route::get('/show-color',[ColortController::class, 'show'])->name('show.color');
   Route::get('/delete-color/{id}',[ColorController::class, 'delete'])->name('delete.color');
   Route::get('/update-color',[ColorController::class, 'update'])->name('update.color');
   //  MANAGE SIZE                          
   Route::get('/size',[SizeController::class, 'index'])->name('add.size');
   Route::post('/size',[SizeController::class, 'store']);
   Route::get('/show-size',[SizeController::class, 'show'])->name('show.size');
   Route::get('/delete-size/{id}',[SizeController::class, 'delete'])->name('delete.size');
   Route::get('/update-size',[SizeController::class, 'update'])->name('update.size');
   Route::post('/update-size/{id}',[SizeController::class, 'update'])->name('update.size');
   Route::get('/staus-size/status/{status}/{id}',[SizeController::class, 'status'])->name('status.size');
  // MANAGE COUPON
    Route::get('/coupon',[CouponController::class, 'index'])->name('add.coupon');
    Route::post('/coupon',[CouponController::class, 'store']);
    Route::get('/show-coupon',[CouponController::class, 'show'])->name('show.coupon');
    Route::get('/delete-coupon/{id}',[CouponController::class, 'delete']);
    Route::get('/update-coupon/{id}',[CouponController::class, 'edit'])->name('update.coupon');
    Route::post('/update-coupon/{id}',[CouponController::class, 'update'])->name('update.coupon');
    Route::get('/status-coupon/status/{status}/{id}',[CouponController::class, 'status'])->name('status.coupon');
   
    
   //  Route::get('/Sub-Category',[SubCategroController::class, 'index']);
});    





//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
