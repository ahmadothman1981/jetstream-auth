<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
    public function Index()
    {
        $blogpost = BlogPost::latest()->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->get();
        $feature = Product::where('featured',1)->orderBy('id','DESC')->limit(4)->get();
        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(4)->get();
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

        return view('frontend.index',compact('categories','sliders','products','feature','hot_deals','special_offer','special_deals','skip_category_0','skip_product_0','skip_category_1','skip_product_1','skip_brand_1','skip_brand_product_1','blogpost'));
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

      $color_en = $product->product_color_en;
      $product_color_en = explode(',',$color_en);

       $color_ar = $product->product_color_ar;
      $product_color_ar = explode(',',$color_ar);

       $size_en = $product->product_size_en;
      $product_size_en = explode(',',$size_en);

       $size_ar = $product->product_size_ar;
      $product_size_ar = explode(',',$size_ar);


      $multiImage = MultiImg::where('product_id',$id)->get(); 

      $cat_id = $product->category_id;
      $relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();

      return view('frontend.product.product_details',compact('product','multiImage','product_color_en','product_color_ar','product_size_en','product_size_ar','relatedProduct'));
    }//End Method

    public function TagWiseProduct($tag)
    {
        $products = Product::where('status',1)->where('product_tags_en',$tag)->orWhere('product_tags_ar',$tag)->orderBy('id','DESC')->paginate(3);
        
        $categories = Category::orderBy('category_name_en','ASC')->get();
       
        return view('frontend.tags.tags_view',compact('products','categories'));
    }//End Method


    public function SubCatWiseProduct( Request $request, $subcat_id , $slug)
    {
        $products = Product::where('status',1)->where('subcategory_id' ,$subcat_id)->orderBy('id','DESC')->paginate(3);
        
        $categories = Category::orderBy('category_name_en','ASC')->get();

        $breadsubcat = SubCategory::with(['category'])->where('id',$subcat_id)->get();

        //load more product with ajax

        if($request->ajax())
        {
            $grid_view = view('frontend.product.grid_view_product',compact('products'))->render();

            $list_view = view('frontend.product.list_view_product',compact('products'))->render();

            return response()->json(['grid_view' => $grid_view,'list_view' => $list_view ]);
        }

        //END load more product with ajax
       
        return view('frontend.product.subcategory_view',compact('products','categories','breadsubcat'));
    }//End Method

    public function SubSubCatWiseProduct($subsubcat_id , $slug)
    {
        $products = Product::where('status',1)->where('subsubcategory_id' ,$subsubcat_id)->orderBy('id','DESC')->paginate(3);
        
        $categories = Category::orderBy('category_name_en','ASC')->get();

       $breadsubsubcat = SubSubCategory::with(['category','subcategory'])->where('id',$subsubcat_id)->get();

        return view('frontend.product.sub_subcategory_view',compact('products','categories','breadsubsubcat'));
    }//End Method


    public function ProductViewAjax($id)
    {
         $product = Product::with('category','brand')->findOrFail($id);

      $color = $product->product_color_en;
      $product_color = explode(',',$color);

      $size = $product->product_size_en;
      $product_size = explode(',',$size);

      return response()->json(array(
        'product'=>$product,
        'color'=>$product_color,
        'size'=>$product_size,


      ));

    }//End Method

/////////////// product search//////////////

    public function ProductSearch(Request $request)
    {

        $request->validate(["search" => "required"]);
        $item = $request->search;

        $products = Product::where('product_name_en','LIKE',"%$item%")->get();

        $categories = Category::orderBy('category_name_en','ASC')->get();

        return view('frontend.product.search',compact('products','categories'));
    }//End Method


/////advance search product

    public function SearchProduct(Request $request)
    {
       $request->validate(["search" => "required"]);
        $item = $request->search;

        $products = Product::where('product_name_en','LIKE',"%$item%")->select('product_name_en','product_thambnail','selling_price','id','product_slug_en')->limit(5)->get();

        

        return view('frontend.product.search_product',compact('products'));
    }//End Method


}
