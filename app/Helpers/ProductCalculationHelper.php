<?php 

namespace App\Helpers;
use App\Models\Product;
class ProductCalculationHelper{



public function productCount()
{
	return Product::count();

}

public function productPercentage()
{
	$product_by_month=Product::whereMonth('created_at', date('m'))->count();
      $product=$this->productCount();
      if($product==0)
      {
      	$product=1;
      }
      return $product_by_month/$product * 100;
    

}


}
