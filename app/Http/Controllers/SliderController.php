<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $sliders = Slider::all();

        return view('admin.interface.slider', compact('sliders'));
    }

  
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8048',
                'small' => 'required|string',
                'large' => 'required|string',
            ]);

         if($request->hasFile('image'))
        {

            $slider['image'] = uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('assets/images/slider',$slider['image']);
        }
        $slider['small'] = $request->small;
        $slider['large'] = $request->large;

        Slider::create($slider);

        return back()->with('success', 'New Slide Created Successfully!');
    }

   public function update(Request $request, $id)
    {
        $slide = Slider::find($id);
        $this->validate($request,
            [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
                'small' => 'required|string',
                'large' => 'required|string',
            ]);

       if($request->hasFile('image'))
        {
             $path = 'assets/images/slider/'.$slide->image;

                if(file_exists($path))
                {
                    unlink($path);
                }
                
            $slide['image'] = uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('assets/images/slider',$slide['image']);
        }

        $slide['large'] = $request->large;
        $slide['small'] = $request->small;
        $slide->save();

        return back()->with('success', 'Slider Updated Successfully!');
    }

    public function destroy(Slider $slider)
    {
        $path = 'assets/images/slider/'.$slider->image;

        if(file_exists($path))
        {
            unlink($path);
        }
        $slider->delete();
        
        return back()->with('success', 'Slider Deleted Successfully!');
    }
}
