<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {   
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();

        return view('backend.category.subcategory_view',compact('subcategory','categories'));
    }//End Method

    public function SubCategoryStore(Request $request){

       $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_ar' => 'required',
        ],[
            'category_id.required' => 'Please Select your Category',
            'subcategory_name_en.required' => 'Input SubCategory English Name',
        ]);

         

    SubCategory::insert([
        'category_id' => $request->category_id,
        'subcategory_name_en' => $request->subcategory_name_en,
        'subcategory_name_ar' => $request->subcategory_name_ar,
        'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
        'subcategory_slug_ar' => str_replace(' ', '-',$request->subcategory_name_ar ),
        

        ]);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method


    public function SubCategoryEdit($id)
    {
       $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);

        return view('backend.category.subcategory_edit',compact('subcategory','categories'));

    }// end method

    public function SubCategoryUpdate(Request $request)
    {
      $subcat_id = $request->id; 
       SubCategory::findOrFail($subcat_id)->update([
        'category_id' => $request->category_id,
        'subcategory_name_en' => $request->subcategory_name_en,
        'subcategory_name_ar' => $request->subcategory_name_ar,
        'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
        'subcategory_slug_ar' => str_replace(' ', '-',$request->subcategory_name_ar ),
        

        ]);

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all_subcategory')->with($notification);

    }// end method


    public function SubCategoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();

         $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }// end method





    ////////////////////////////////////////////////////////////////

    /////////////////Methods For Sub ->Sub Category////////////////
    //////////////////////////////////////////////////////////////

    public function SubSubCategoryView()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();

        return view('backend.category.sub_subcategory_view',compact('subsubcategory','categories'));
    }// end method

     public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
     }//End Method
     public function GetSubSubCategory($subcategory_id){

        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
     }

     public function SubSubCategoryStore(Request $request)
     {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_ar' => 'required',
        ],[
            'category_id.required' => 'Please Select your Category',
            'subcategory_id.required' => 'Please Select your SubCategory',
            'subsubcategory_name_en.required' => 'Input SubCategory English Name',
        ]);

         

    SubSubCategory::insert([
        'category_id' => $request->category_id,
         'subcategory_id' => $request->subcategory_id,
        'subsubcategory_name_en' => $request->subsubcategory_name_en,
        'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
        'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
        'subsubcategory_slug_ar' => str_replace(' ', '-',$request->subsubcategory_name_ar ),
        

        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }//End Method

     public function SubSubCategoryEdit($id)
     {
         $categories = Category::orderBy('category_name_en','ASC')->get();
         $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
          $subsubcategories = SubSubCategory::findOrFail($id);

          return view('backend.category.sub_subcategory_edit',compact('categories','subcategories','subsubcategories'));
     }//End Method

     public function SubSubCategoryUpdate(Request $request)
     {
         $subsubcat_id = $request->id;

         $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_ar' => 'required',
        ],[
            'category_id.required' => 'Please Select your Category',
            'subcategory_id.required' => 'Please Select your SubCategory',
            'subsubcategory_name_en.required' => 'Input SubCategory English Name',
        ]);

         

    SubSubCategory::findOrFail($subsubcat_id)->update([
        'category_id' => $request->category_id,
         'subcategory_id' => $request->subcategory_id,
        'subsubcategory_name_en' => $request->subsubcategory_name_en,
        'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
        'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
        'subsubcategory_slug_ar' => str_replace(' ', '-',$request->subsubcategory_name_ar ),
        

        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all_subsubcategory')->with($notification);
     }//End Method

     public function SubSubCategoryDelete($id)
     {
         SubSubCategory::findOrFail($id)->delete();

          $notification = array(
            'message' => 'Sub-SubCategory Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
     }//End Method

    
}
