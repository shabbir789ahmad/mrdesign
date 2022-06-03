<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Http\Traits\ImageTrait;
use App\Http\Solid\singleLogo;
class LogoController extends Controller
{    
    use ImageTrait;
    protected $logo;
    function __construct(singleLogo $logo)
    {
        $this->logo=$logo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos=$this->logo->get();
        return view('Dashboard.panel.logo.index',compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Dashboard.panel.logo.create');
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

             'logo_detail'=>'required',
             'image'=>'required',

        ]);

         $data=[

            'logo_detail'=>$request->logo_detail,
            'logo'=>$this->image(),
         ];
        
        return  \FormHelper::createEloquent(new Logo, $data);
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
        $logo=$this->logo->find($id);
        return view('Dashboard.panel.logo.edit',compact('logo'));
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

            'logo_detail'=>'required',
          

       ]);

        if($request->file('image'))
        {
            $data=[

                'logo_detail'=>$request->logo_detail,
                'logo'=>$this->image(),
             ];
        }else{
            $data=[

                'logo_detail'=>$request->logo_detail,
                
             ];
        }
        
       
       return  \FormHelper::updateEloquent(new Logo,$id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return  \FormHelper::deleteEloquent(new Logo,$id);
    }
}
