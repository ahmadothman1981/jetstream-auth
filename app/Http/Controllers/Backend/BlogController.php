<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function BlogCategory()
    {
        $blogcategory = BlogPostCategory::latest()->get();

        return view('backend.blog.category.category_view',compact('blogcategory'));
    }//End Method

    public function BlogCategoryStore(Request $request)
    {
      $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_ar' => 'required',
            
            'blog_category_name_en.required' => 'InputBlog  Category English Name',
            'blog_category_name_ar.required' => 'Input Blog Category Arabic Name',
        ]);

         

    BlogPostCategory::insert([
        'blog_category_name_en' => $request->blog_category_name_en,
        'blog_category_name_ar' => $request->blog_category_name_ar,
        'blog_category_slug_en' => strtolower(str_replace(' ', '-',$request->blog_category_name_en)),
        'blog_category_slug_ar' => str_replace(' ', '-',$request->blog_category_name_ar),
        'created_at'=>Carbon::now(),
        

        ]);

        $notification = array(
            'message' => ' Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);  
    }//End Method

    public function BlogCategoryEdit($id)
    {
          $blogcategory = BlogPostCategory::findOrFail($id);

        return view('backend.blog.category.category_edit',compact('blogcategory'));
    }//End Method


    public function BlogCategoryUpdate(Request $request)
    {
        $blogcat_id =$request->id;
        

         

    BlogPostCategory::findOrFail($blogcat_id)->update([
        'blog_category_name_en' => $request->blog_category_name_en,
        'blog_category_name_ar' => $request->blog_category_name_ar,
        'blog_category_slug_en' => strtolower(str_replace(' ', '-',$request->blog_category_name_en)),
        'blog_category_slug_ar' => str_replace(' ', '-',$request->blog_category_name_ar),
        'created_at'=>Carbon::now(),
        

        ]);

        $notification = array(
            'message' => ' Blog Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('blog.category')->with($notification);   
    }//End Method

    public function BlogCategoryDelete($id)
    {
      BlogPostCategory::findOrFail($id)->delete(); 
      
       $notification = array(
            'message' => ' Blog Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('blog.category')->with($notification);   
    }//End Method
}
