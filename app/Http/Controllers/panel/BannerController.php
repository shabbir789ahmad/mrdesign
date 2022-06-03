<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BannerRequest;
use App\models\Banner;
use App\Http\Traits\ImageTrait;
use App\Helpers\BannerHelper;
class BannerController extends Controller
{
     use ImageTrait;
   
    protected $banner;
   
   /**
     *inject banner helper class dependency.
     *
     * App\helpers\BannerHelper
     */

    function __construct(BannerHelper $banner)
    {
        $this->banner=$banner;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners= $this->banner->banners();
        return view('Dashboard.panel.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Dashboard.panel.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $data=[
           'banner_image'=>$this->image(),
        ];
        
        return  \FormHelper::createEloquent(new Banner, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $banner= $this->banner->findBanner($id);
        return view('Dashboard.panel.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
       
          $data=[
           'banner_image'=>$this->image(),
          ];

          $banner= $this->banner->findBanner($id);
        unlink('uploads/brand/'.$banner['banner_image']);
       return  \FormHelper::updateEloquent(new Banner,$id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner= $this->banner->findBanner($id);
        unlink('uploads/brand/'.$banner['banner_image']);
        return  \FormHelper::deleteEloquent(new Banner,$id);
    }
}
