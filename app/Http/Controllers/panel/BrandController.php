<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Traits\ImageTrait;
use App\Helpers\BrandHelper;
use Auth;
class BrandController extends Controller
{
    use ImageTrait;
    protected $brand;
    function __construct(BrandHelper $brand)
    {
        $this->brand=$brand;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $brands=$this->brand->get();
        return view('Dashboard.panel.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.panel.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $data=array_merge($request->validated(),[ 'brand_image'=>$this->image()]);

        

         return \FormHelper::createEloquent(new Brand, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        $brand=$this->brand->find($id);
        return view('Dashboard.panel.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        if($request->file('image'))
        {
            $data=array_merge($request->validated(),[ 'brand_image'=>$this->image()]);
       }else{

            $data=$request->validated();
        }
         return \FormHelper::updateEloquent(new Brand,$id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return \FormHelper::deleteEloquent(new Brand,$id);
    }
}
