<?php

namespace App\Http\Solid;
use App\Models\Logo;
use App\http\Solid\SingleInterface;
class singleLogo implements SingleInterface{


    function get()
    {
        return Logo::select('logo','logo_detail','id')->latest()->get();
    }

    function find($id)
    {
        return Logo::findorfail($id);
    }
}