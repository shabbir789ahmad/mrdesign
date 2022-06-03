<?php

namespace App\Http\Traits;
use App\models\Product;
use DB;
trait ProductTrait
 {

    function products()
   {
       $query=Product::with('image')->join('product_stocks','products.id','=','product_stocks.product_id')
       ->join('categories','categories.id','=','products.category_id')
       ->join('sub_categories','sub_categories.id','=','products.sub_category_id')
       ->select('products.id','products.product_name','product_stocks.price','product_stocks.stock','product_stocks.stock_sold'
       ,'categories.category_name','sub_categories.sub_category_name')
       ->where('stock','>',0);

       return $product=$query->get();
       
   }

   function getProduct($category_id)
   {
       $query=Product::with('image')
       ->join('product_stocks','products.id','=','product_stocks.product_id')
       ->leftjoin('reviews','products.id','=','reviews.product_id')
       ->select('reviews.product_id',DB::raw('avg(rating) as rating'),'products.id','products.product_name','product_stocks.price','product_stocks.discount_price')
      ->groupBy('reviews.product_id','products.id','products.product_name','product_stocks.price','product_stocks.discount_price')
       ->where('stock','>',0);
      
       if($category_id)
       {
           $query=$query->where('category_id','=',$category_id);
       }
       return $product=$query->get();
       
   }

   function detail($id)
   {
       return Product::with('images')
       ->join('product_stocks','products.id','=','product_stocks.product_id')
       ->leftjoin('reviews','products.id','=','reviews.product_id')
       ->select('reviews.product_id',DB::raw('avg(rating) as rating'),'products.sub_category_id','products.product_detail','products.id','products.product_name','product_stocks.price','product_stocks.discount_price')
      ->groupBy('reviews.product_id','products.sub_category_id','products.id','products.product_detail','products.product_name','product_stocks.price','product_stocks.discount_price')
       ->where('stock','>',0)->findorfail($id);
   }

 }

?>