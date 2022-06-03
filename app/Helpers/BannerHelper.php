<?php 
namespace App\Helpers;

use App\Models\Banner;

class BannerHelper{


	public  function banners()
    {
        return Banner::latest()->get();
    }

    public  function findBanner($id)
    {
        return Banner::findorfail($id);
    }
}

