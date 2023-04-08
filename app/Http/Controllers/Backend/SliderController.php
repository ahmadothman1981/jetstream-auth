<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Image;


class SliderController extends Controller
{
    public function SliderView()
    {
        $sliders = Slider::latest()->get();

        return view('backend.slider.slider_view',compact('sliders'));


    }//End Method

    public function SliderStore(Request $request)
    {

          if(!Auth::guard('admin')->user()->can('Slider_create'))
    {
        abort(403);
    }
         $request->validate([
       
        'slider_img'=> 'required',

      ],[
        'slider_img.required'=> 'Please Insert One Image',
     
      ]); 

      $image = $request->file('slider_img');
      $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
      $save_url = 'upload/slider/'.$name_gen;

      Slider::insert([
        'title'=>$request->title,
        'description'=>$request->description,
        'slider_img'=>$save_url,
        'created_at'=>Carbon::now(),

      ]);
         $notification = array(
            'message'=> 'Slider Image Inserted Successfully',
            'alert-type' => 'success',
        );

         return redirect()->back()->with( $notification);

    }//End Method


    public function SliderEdit($id)
    {

          if(!Auth::guard('admin')->user()->can('Slider_edit'))
    {
        abort(403);
    }
         $sliders = Slider::findOrFail($id);

        return view('backend.slider.slider_edit',compact('sliders'));
    }//End Method


    public function SliderUpdate(Request $request)
    {

          if(!Auth::guard('admin')->user()->can('Slider_edit'))
    {
        abort(403);
    }
         $slider_id = $request->id;
        $old_slider = $request->old_image;
        if($request->file('slider_img'))
        {
            unlink($old_slider);
          $image = $request->file('slider_img');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
          $save_url = 'upload/slider/'.$name_gen;

          Slider::findOrFail($slider_id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'slider_img'=>$save_url,

          ]);
             $notification = array(
                'message'=> 'Slider Image Updated Successfully',
                'alert-type' => 'info',
            );

             return redirect()->route('manage-slider')->with( $notification);  
        }else{
            Slider::findOrFail($slider_id)->update([
             'title'=>$request->title,
            'description'=>$request->description,

          ]);
             $notification = array(
                'message'=> 'Slider Updated Without Image Successfully',
                'alert-type' => 'info',
            );

             return redirect()->route('manage-slider')->with( $notification);  
        }//end else 
    }//End Method


    public function SliderDelete($id)
      {

          if(!Auth::guard('admin')->user()->can('Slider_delete'))
    {
        abort(403);
    }
        $slid = Slider::findOrFail($id);
        $img = $slid->slider_img;
        unlink($img);
        Slider::findOrFail($id)->delete();
          $notification = array(
                'message'=> 'Slid Image Deleted Successfully',
                'alert-type' => 'info',
            );

             return redirect()->back()->with( $notification); 
      }//End Method


      public function SliderInactive($id)
      {

          if(!Auth::guard('admin')->user()->can('Slider_delete'))
    {
        abort(403);
    }
        Slider::findOrFail($id)->update([
            'status'=> 0,
        ]);

         $notification = array(
                'message'=> 'Slid Image Inactive Successfully',
                'alert-type' => 'info',
            );

             return redirect()->back()->with( $notification);

      }//End Method

      public function SliderActive($id)
      {
        
          if(!Auth::guard('admin')->user()->can('Slider_delete'))
    {
        abort(403);
    }
        Slider::findOrFail($id)->update([
            'status'=> 1,
        ]);

         $notification = array(
                'message'=> 'Slid Image Active Successfully',
                'alert-type' => 'info',
            );

             return redirect()->back()->with( $notification);

      }//End Method
}
