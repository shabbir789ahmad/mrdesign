<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\ProductImage;
use App\Models\Category;
use App\Http\Traits\ProductTrait;
use DB;
class ProductController extends Controller
{

  use ProductTrait;

    function index()
    {
        $products=$this->products();//from product model

       
      // dd($products);
       return view('Dashboard.panel.product.index',compact('products'));
    }

    function create()
    {
        
        $categories=Category::category();//from category model
         return view('Dashboard.panel.product.create',compact('categories'));
    }


    function store(Request $request)
    {

        $request->validate([

          'product_name'=>'required',
          'product_detail'=>'required',
          'category_id'=>'required',
          'sub_category_id'=>'required',
          'product_code'=>'required',
          'stock'=>'required',
          'price'=>'required',
          'purchasing_price'=>'required',
          'product_image'=>'required',
        ]);

        try{
       
          \DB::beginTransaction();

        
          $product=Product::create([

            'product_name'=>$request->product_name,
            'product_detail'=>$request->product_detail,
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'product_code'=>$request->product_code,
             'vendor_id' => 1,
        ]);

      

        
          ProductStock::create([
           'stock' =>$request->stock,
           'price' =>$request->price,
           'discount_price' =>$request->discount_price??null,
           'purchasing_price' =>$request->purchasing_price,
           'product_tax' =>$request->product_tax??null,
           
           'product_id' =>$product->id,
           ]);
     
          

       foreach($request->file('product_image') as $file)
     {
       ProductImage::create([
       $ext=$file->getClientOriginalExtension(),
       $name=$file->getClientOriginalName(),
       $filename=$name,
       $file->move('uploads/img/', $filename),
       'product_image'=>$filename,
       'product_id'=> $product->id,
        ]);
      
     }
  
     \DB::commit();
      
     return to_route('product.index')->with('success','Product Created successfully');

    }catch(\Exception $e)
    {
      \App\Helpers\Logger::logActivity(\Route::currentRouteName(),$e);
     }
    

    } 


    function edit($id)
    {
        $product=Product::findorfail($id);
         return view('Dashboard.panel.product.edit',compact('product'));
    }

    function update($id,Request $request)
    {

    }


    function destroy($id)
    {
        product::destroy($id);

        return redirect()->back()->with('success','Product Deleted');
    }
}
