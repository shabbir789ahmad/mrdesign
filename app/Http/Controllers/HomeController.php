<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Product;
use App\models\Slider;
use App\Http\Traits\ProductTrait;
use App\Helpers\BannerHelper;
class HomeController extends Controller
{
    
    use ProductTrait;
       protected $banner;
     function __construct(BannerHelper $banner)
    {
        $this->banner=$banner;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=$this->getProduct($category_id='');
        $sliders=Slider::sliders();
        $banners=$this->banner->banners();
        
        return view('home',compact('products','sliders','banners'));
    }

    public function productDetail($id)
    {
        
        $product=$this->detail($id);
        $products=$this->getProduct($product['sub_category_id']);
        // dd($product);
        return view('product_detail',compact('product','products'));
    }

    public function productByCategory($id)
    {
        
        $products=$this->getProduct($id);
        
        return view('all_product',compact('products'));
    }

}
