<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Color;
use App\Http\Requests\ColorRequest;
class ColorController extends Controller
{
    function index()
    {
        $colors=Color::colors();
        return view('Dashboard.panel.color.index',compact('colors'));
    }

    function create()
    {
       
        return view('Dashboard.panel.color.create');
    }

    function edit(Color $color)
    {
        return view('Dashboard.panel.color.edit',compact('color'));
    }

    function store(ColorRequest $request)
    {
       return \App\Helpers\Form::createEloquent(new Color,$request->validated());
    }

    function update(ColorRequest $request,$id)
    {
       return \App\Helpers\Form::updateEloquent(new Color,$id,$request->validated());
    }


    function destroy( $id)
    {
       return \App\Helpers\Form::deleteEloquent(new Color,$id);
    }


}
