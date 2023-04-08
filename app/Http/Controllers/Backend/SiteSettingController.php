<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Seo;
use Image;

class SiteSettingController extends Controller
{
    public function SiteSetting()
    {
        $setting = SiteSetting::find(1);

        return view('backend.setting.setting_update',compact('setting'));
    }//End Method



    public function SiteSettingUpdate(Request $request)
    {

          if(!Auth::guard('admin')->user()->can('site_setting'))
    {
        abort(403);
    }
      $setting_id = $request->id;
       
        if($request->file('logo'))
        {
            
          $image = $request->file('logo');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(139,36)->save('upload/logo/'.$name_gen);
          $save_url = 'upload/logo/'.$name_gen;

          SiteSetting::findOrFail($setting_id)->update([
            'phone_one'=>$request->phone_one,
            'phone_two'=>$request->phone_two,
            'email'=>$request->email,
            'company_name'=>$request->company_name,
            'company_address'=>$request->company_address,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'linkedin'=>$request->linkedin,
            'youtube'=>$request->youtube,
            'logo'=>$save_url,

          ]);
             $notification = array(
                'message'=> 'Setting Updated With Image Successfully',
                'alert-type' => 'info',
            );

             return redirect()->back()->with( $notification);  
        }else{
            SiteSetting::findOrFail($setting_id)->update([
            'phone_one'=>$request->phone_one,
            'phone_two'=>$request->phone_two,
            'email'=>$request->email,
            'company_name'=>$request->company_name,
            'company_address'=>$request->company_address,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'linkedin'=>$request->linkedin,
            'youtube'=>$request->youtube,
            
            

          ]);
             $notification = array(
                'message'=> 'Setting Updated WithOut Image Successfully',
                'alert-type' => 'info',
            );

             return redirect()->back()->with( $notification);  
        }//end else   
    }//End Method


    public function SeoSetting()
    {
         $seo = Seo::find(1);

        return view('backend.setting.seo_update',compact('seo'));
    }//End Method

    public function SeoSettingUpdate(Request $request)
    {
        
          if(!Auth::guard('admin')->user()->can('seo_setting'))
    {
        abort(403);
    }

        $seo_id = $request->id;

         Seo::findOrFail($seo_id)->update([
            'meta_title'=>$request->meta_title,
            'meta_author'=>$request->meta_author,
            'meta_keyword'=>$request->meta_keyword,
            'meta_description'=>$request->meta_description,
            'google_analytics'=>$request->google_analytics,
            

          ]);
             $notification = array(
                'message'=> 'Seo Setting Updated  Successfully',
                'alert-type' => 'info',
            );

             return redirect()->back()->with( $notification);  
    }//End Method
}
