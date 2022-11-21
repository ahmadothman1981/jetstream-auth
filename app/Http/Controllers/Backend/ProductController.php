<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\MultiImg;
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


        $product_id = Product::insertGetId([
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
        ]);


        //////////////////////////Multiple Image Upload Start//////////////////////////

        
      $images = $request->file('multi_image');
      foreach($images as $img){
        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('upload/products/multi-images/'.$make_name);
        $uploadPath = 'upload/products/multi-images/'.$make_name;

        MultiImg::insert([

            'product_id' => $product_id,
            'photo_name' => $uploadPath,
            'created_at' => Carbon::now(), 

        ]);

      }

$notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);

    }//End Method


    public function ManageProduct()
    {
        $products = Product::latest()->get();

        return view('backend.product.product_view',compact('products'));
    }//End Method

    public function EditProduct($id)
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);
        $multiImages = MultiImg::where('product_id', $id)->get();
        return view('backend.product.product_edit',compact('categories','brands','subcategories','subsubcategories','products','multiImages'));
    }//End Method

    public function ProductDataUpdate(Request $request)
    {
        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
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
            'created_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);



    }//End Method

/////////Multiple image update//////////
    public function MultiImageUpdate(Request $request)
    {
        $imgs = $request->multi_image;

        foreach($imgs as $id => $img)
        {
        $imgDelete = MultiImg::findOrFail($id);
        unlink($imgDelete->photo_name);
        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('upload/products/multi-images/'.$make_name);
      $upload_path = 'upload/products/multi-images/'.$make_name;
      MultiImg::where('id',$id)->update([
        'photo_name'=> $upload_path,
        'updated_at'=>Carbon::now(),


      ]);
     }//end foreach

      $notification = array(
            'message' => 'Product Image Updated  Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }//End Method


/////////////Product Main Thambnail Image////////////////////
    public function ThambnailImageUpdate(Request $request)
    {
        $pro_id = $request->id;
        $old_image = $request->old_img;
        unlink($old_image);

        $image = $request->file('product_thambnail');
      $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
      $save_url = 'upload/products/thambnail/'.$name_gen;
      
      Product::findOrFail($pro_id)->update([
        'product_thambnail'=> $save_url,
        'updated_at'=>Carbon::now(),


      ]);

      $notification = array(
            'message' => 'Product Thambnail Image Updated  Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);


    }//End Method


    public function MultiImageDelete($id)
    {
       $oldImg = MultiImg::findOrFail($id);
       
       unlink($oldImg->photo_name);
       MultiImg::findOrFail($id)->delete();

       $notification = array(
            'message' => 'Product  Image Deleted  Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }//End Method


    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update([
            'status'=> 0,
        ]);
     $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }//End Method


     public function ProductActive($id)
    {

      Product::findOrFail($id)->update([
            'status'=> 1,
        ]);
     $notification = array(
            'message' => 'Product activated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
    }//End Method
}



