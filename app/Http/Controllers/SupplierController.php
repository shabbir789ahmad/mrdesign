<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Traits\ImageTrait;
use Auth;

class SupplierController extends Controller
{
 

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=Supplier::all();
        return view('Dashboard.panel.supplier.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.panel.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

           'supplier_name'=>'required|unique:suppliers',
           'supplier_email'=>'required',
           'supplier_phone'=>'required',
           'supplier_address'=>'required',
           'image'=>'required',
        ]);

        $data=[
            'supplier_name'=>$request->supplier_name,
            'supplier_email'=>$request->supplier_email,
            'supplier_phone'=>$request->supplier_phone,
            'supplier_address'=>$request->supplier_address,
            'supplier_image'=>$this->image(),
            'vendor_id'=>Auth::id(),
            ];
         
         return \FormHelper::createEloquent(new Supplier, $data);
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
        $supplier=Supplier::findorfail($id);
        return view('Dashboard.panel.supplier.edit',compact('supplier'));
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
        $request->validate([

            'supplier_name'=>'required',
            'supplier_email'=>'required',
            'supplier_phone'=>'required',
            'supplier_address'=>'required',
            
         ]);
         
         if($request->hasfile('image'))
         {
         $data=[
             'supplier_name'=>$request->supplier_name,
             'supplier_email'=>$request->supplier_email,
             'supplier_phone'=>$request->supplier_phone,
             'supplier_address'=>$request->supplier_address,
             'supplier_image'=>$this->image(),
             'vendor_id'=>Auth::id(),
             ];
        }else
        {
            $data=[
                'supplier_name'=>$request->supplier_name,
                'supplier_email'=>$request->supplier_email,
                'supplier_phone'=>$request->supplier_phone,
                'supplier_address'=>$request->supplier_address,
                'vendor_id'=>Auth::id(),
                ];
        }
         return \FormHelper::updateEloquent(new Supplier,$id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return \FormHelper::deleteEloquent(new Supplier,$id);
    }
}
