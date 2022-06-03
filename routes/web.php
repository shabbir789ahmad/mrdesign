<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\panel\VendorController;
use App\Http\Controllers\panel\BrandController;
use App\Http\Controllers\panel\CategoryController;
use App\Http\Controllers\panel\SubCategoryController;
use App\Http\Controllers\panel\ProductController;
use App\Http\Controllers\panel\SliderController;
use App\Http\Controllers\panel\BannerController;
use App\Http\Controllers\panel\LogoController;
use App\Http\Controllers\panel\ColorController;

use App\Http\Controllers\SupplierController;

use App\Http\Controllers\HomeController;
//websites route
Route::get('/', [HomeController::class,'index']);
Route::get('/product/by/{id}/category', [HomeController::class,'productByCategory'])->name('product.by.category');

Route::get('/product/{id}/detail', [HomeController::class,'productDetail'])->name('product.detail');



//admin route
Route::group(['prefix'=>'vendor'],function()
{
  Route::group(['middleware'=>'vendor.guest'],function()
  {
    Route::view('/login','admin.admin_login')->name('vendor.login');
    Route::post('authenticate',[VendorController::class,'adminLogin'])->name('vendor.authenticate');
  });



  
  Route::get('get/subcategory',[SubCategoryController::class,'subCategory'])->name('sub_category.get');


  //loggedin route
  Route::group(['middleware'=>'vendor.auth'],function()
  {

    Route::post('vendor/logout',[VendorController::class,'logout'])->name('vendor.logout');
     Route::get('dashboard',[DashboardController::class,'index'])->name('vendor.dashboard');

     //logo
      Route::resource('logo', LogoController::class);
      //slider
      Route::resource('slider', SliderController::class);
      //banners
      Route::resource('banner', BannerController::class);
      
     //admin route
      Route::resource('brand', BrandController::class);
     //categoories
      Route::resource('category', CategoryController::class);
     //sub category route
      Route::resource('sub_category',SubCategoryController::class);
     //product route
      Route::resource('product', ProductController::class);
     //supplier
      Route::resource('supplier', SupplierController::class);
      
     //color
      Route::resource('color', ColorController::class);

  });

});  


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
