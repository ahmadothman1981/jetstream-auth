<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;


class ShopController extends Controller
{
    public function ShopPage()
    {
        $query = Product::query();
        $currentLang = app()->getLocale();

          if (!empty($_GET['category']))
          {

            $slugs = explode(',',$_GET['category']);
            $catSlugAttrName = 'category_slug_'.$currentLang;

            $catIds = Category::select('id')->whereIn($catSlugAttrName,$slugs)->pluck('id')->toArray();
            $searchedProducts = $query->whereIn('category_id',$catIds);

          }

        if (!empty($_GET['brand'])) {
            $slugs = explode(',',$_GET['brand']);
            $brandSlugAttrName = 'brand_slug_'.$currentLang;
            $brandIds = Brand::select('id')->whereIn($brandSlugAttrName,$slugs)->pluck('id')->toArray();
            $searchedProducts = $query->whereIn('brand_id',$brandIds);
        }else{

            $searchedProducts = Product::query();
        }

        $products = $searchedProducts->where('status',1)->orderBy('id','DESC')->paginate(3);


        /*** st new code ****/
        $categoryName = $currentLang =='ar'? 'category_name_ar':'category_name_en';
        $categorySlug = $currentLang =='ar'? 'category_slug_ar':'category_slug_en';
        $categoryFieldArray = ['id', $categoryName.' as name', $categorySlug.' as slug'];
        $categories = Category::select($categoryFieldArray)
            ->orderBy('category_name_en','ASC')->get();

        /*** nd new code ****/
        /*** st new code ****/
        $brandName = $currentLang =='ar'? 'brand_name_ar':'brand_name_en';
        $brandSlug = $currentLang =='ar'? 'brand_slug_ar':'brand_slug_en';
        $brandFieldArray = ['id', $brandName.' as name', $brandSlug.' as slug'];
        $brands = Brand::select($brandFieldArray)
            ->orderBy('brand_name_en','ASC')->get();
        /*** nd new code ****/
          return view('frontend.shop.shop_page',compact('products','categories','brands'));
    }//End Method
   /* public function ShopPage()
    {
        $query = Product::query();

          if (!empty($_GET['category'])) {
            $slugs = explode(',',$_GET['category']);
            $catIds = Category::select('id')->whereIn('category_slug_en',$slugs)->pluck('id')->toArray();
            //$products = Product::whereIn('category_id',$catIds)->paginate(3);
            $products = $query->whereIn('category_id',$catIds);
            
        }
        if (!empty($_GET['brand'])) {
            $slugs = explode(',',$_GET['brand']);
            $brandIds = Brand::select('id')->whereIn('brand_slug_en',$slugs)->pluck('id')->toArray();
            
            $products = $query->whereIn('brand_id',$brandIds);
        }else{
        
            $products = Product::where('status',1)->orderBy('id','DESC')->paginate(3);
        }
        

       
        
        $allCategories = Category::orderBy('category_name_en','ASC')->get();
        $categoriesData =[];
        foreach($allCategories as $category)
        {
            $categoriesData[]=(object)[
                'id'=>$category->id,
                 'name'=>app()->getLocale() =='ar'? $category->category_name_ar:$category->category_name_en,
                'slug'=>app()->getLocale() =='ar'? $category->category_slug_ar:$category->category_slug_en,
            ];
        }

        $categories = Collection::make($categoriesData);
        $allbrands = Brand::orderBy('brand_name_en','ASC')->get();
        $brandsData =[];
        foreach($allbrands as $brand)
        {
            $brandsData[]=(object)[
                'id'=>$brand->id,
                'name'=>app()->getLocale() =='ar'?$brand->brand_name_ar:$brand->brand_name_en,
                'slug'=>app()->getLocale()=='ar'?$brand->brand_slug_ar:$brand->brand_slug_en,
            ];  
        }

        $brands = Collection::make($brandsData);
//dd($brands);
        return view('frontend.shop.shop_page',compact('products','categories','brands'));
    }//End Method*/

    public function ShopFilter(Request $request)
    {
       // dd($request->all());
        $data = $request->all();
//dd($data['brand']);
        //filter category 

        $catUrl = "";

        if (!empty($data['category'])) {
              foreach($data['category'] as $category) 
              {
                  if (empty($catUrl)) {
                     $catUrl .= '&category='.$category;
                  }else{
                    $catUrl .= ','.$category;
                  }
               }
            } // end if condition 



            // filter brand 
            $brandUrl = "";

        if (!empty($data['brand'])) {
            foreach($data['brand'] as $brand)
            {
            if (empty($brandUrl)) {
                     $brandUrl .= '&brand='.$brand;
                  }else{
                    $brandUrl .= ','.$brand;
                  }
               
            } // end if condition 

        }
        return redirect()->route('shop.page',$catUrl.$brandUrl);
    }//End Method
}
