<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Product;
use App\Helpers\ProductCalculationHelper;
use App\Helpers\OrderCalculationHelper;
class DashboardController extends Controller
{
    protected $product,$order;
    function __construct(ProductCalculationHelper $product,OrderCalculationHelper $order)
    {
        $this->product=$product;
        $this->order=$order;
    }

    function index()
    {
        $product= $this->product->productCount();
        $product_percentage= $this->product->productPercentage();
        
        $order= $this->order->orderCount();
        $order_percentage= $this->order->orderPercentage();
        
        return view('Dashboard.dashboard',compact('product','product_percentage','order_percentage','order'));
        
    }
}
