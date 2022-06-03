<?php 

namespace App\Helpers;
use App\Models\Order;
class OrderCalculationHelper{


public function orderCount()
{
	return Order::count();

}

public function orderPercentage()
{
	$product_by_month=Order::whereMonth('created_at', date('m'))->count();
      $product=$this->orderCount();
      if($product==0)
      {
      	$product=1;
      }
      return $product_by_month/$product * 100;


    
}


}