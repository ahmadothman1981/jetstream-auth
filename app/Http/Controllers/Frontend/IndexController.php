<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Brand;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->get();
        $feature = Product::where('featured',1)->orderBy('id','DESC')->limit(4)->get();
        $hot_deals = Product::where('hot_deals',1)->orderBy('id','DESC')->limit(4)->get();
        $special_offer = Product::where('spacial_offer',1)->orderBy('id','DESC')->limit(6)->get();
        $special_deals = Product::where('spacial_deals',1)->orderBy('id','DESC')->limit(5)->get();
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();

        $skip_brand_1 = Brand::skip(0)->first();
        $skip_brand_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','DESC')->get();
        //return $skip_category->id;
       // die();

        return view('frontend.index',compact('categories','sliders','products','feature','hot_deals','special_offer','special_deals','skip_category_0','skip_product_0','skip_category_1','skip_product_1','skip_brand_1','skip_brand_product_1'));
    }//end method

    public function UserLogout()
    {
        Auth::logout();
        return redirect()->route('login'); 
    }//end method

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.user_profile',compact('user'));
    }//end method

    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
         $data->phone = $request->phone;

        if($request->file('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message'=> 'User Profile Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('user.profile')->with( $notification);
    }//end method

    public function UserChangePassword()
    {

        
        return view('frontend.profile.change_password');
    }//end method

   public function UserPasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword'=> 'required',
            'password' =>'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword))
        {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');

        }else{
            return redirect()->back();
        }
    }//End Method


    public function ProdcutDetail($id,$slug)
    {
      $product = Product::findOrFail($id);
      $multiImage = MultiImg::where('product_id',$id)->get(); 

      return view('frontend.product.product_details',compact('product','multiImage'));
    }//End Method


}
