<?php 
namespace App\Helpers;

use App\Models\Brand;
class BrandHelper
{
   function get()
    {
        return Brand::select('brand_name','brand_image','id')->latest()->get();
    }

    function find($id)
    {
        return Brand::findorfail($id);
    }
}