<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();

        return view('backend.product.product_add',compact('categories','brands'));

    }//End Method

    public function StoreProduct(Request $request)
    {

    $image = $request->file('product_thambnail');
      $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
      $save_url = 'upload/products/thambnail/'.$name_gen;
        Product::insert([
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_id'=>$request->subsubcategory_id,
            'product_name_en'=>$request->product_name_en,
            'product_name_ar'=>$request->product_name_ar,
            'product_slug_en'=>strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_ar'=>str_replace(' ','-',$request->product_name_ar),
            'product_code'=>$request->product_code,
            'product_qty'=>$request->product_qty,
            'product_tags_en'=>$request->product_tags_en,
            'product_tags_ar'=>$request->product_tags_ar,
            'product_size_en'=>$request->product_size_en,
            'product_size_ar'=>$request->product_size_ar,
            'product_color_en'=>$request->product_color_en,
            'product_color_ar'=>$request->product_color_ar,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_desc_en'=>$request->short_desc_en,
            'short_desc_ar'=>$request->short_desc_ar,
            'long_desc_en'=>$request->long_desc_en,
            'long_desc_ar'=>$request->long_desc_ar,
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'spacial_offer'=>$request->spacial_offer,
            'spacial_deals'=>$request->spacial_deals,
            'status'=>1,
            'product_thambnail'=>$save_url,
            'created_at'=>Carbon::now(),
        ])
    }//End Method
}
