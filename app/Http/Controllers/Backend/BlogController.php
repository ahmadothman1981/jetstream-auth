<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use Image;

class BlogController extends Controller
{
    public function BlogCategory()
    {
        $blogcategory = BlogPostCategory::latest()->get();

        return view('backend.blog.category.category_view',compact('blogcategory'));
    }//End Method

    public function BlogCategoryStore(Request $request)
    {
        if(!Auth::guard('admin')->user()->can('Blog_create'))
    {
        abort(403);
    }
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
        if(!Auth::guard('admin')->user()->can('Blog_edit'))
    {
        abort(403);
    }
          $blogcategory = BlogPostCategory::findOrFail($id);

        return view('backend.blog.category.category_edit',compact('blogcategory'));
    }//End Method


    public function BlogCategoryUpdate(Request $request)
    {
        if(!Auth::guard('admin')->user()->can('Blog_edit'))
    {
        abort(403);
    }
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
        if(!Auth::guard('admin')->user()->can('Blog_delete'))
    {
        abort(403);
    }
      BlogPostCategory::findOrFail($id)->delete(); 
      
       $notification = array(
            'message' => ' Blog Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('blog.category')->with($notification);   
    }//End Method



    ///////BlogPost All ///////////

    public function ListBlogPost()
    {
        $blogpost = BlogPost::with('category')->latest()->get();


        return view('backend.blog.post.post_list',compact('blogpost')); 
    }//End Method


    public function AddBlogPost()
    {
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();


        return view('backend.blog.post.post_view',compact('blogpost','blogcategory'));
    }//End Method

    public function BlogPostStore(Request $request)
    {

        
    $request->validate([
            'post_title_en' => 'required',
            'post_title_ar' => 'required',
            'post_image' => 'required',
        ],[
            'post_title_en.required' => 'Input Post Title English Name',
            'post_title_ar.required' => 'Input Post Title Arabic Name',
        ]);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(780,433)->save('upload/post/'.$name_gen);
        $save_url = 'upload/post/'.$name_gen;

    BlogPost::insert([
        'category_id' => $request->category_id,
        'post_title_en' => $request->post_title_en,
        'post_title_ar' => $request->post_title_ar,
        'post_slug_en' => strtolower(str_replace(' ', '-',$request->post_title_en)),
        'post_slug_ar' => str_replace(' ', '-',$request->post_title_ar),
        'post_image' => $save_url,
        'post_details_en' => $request->post_details_en,
        'post_details_ar' => $request->post_details_ar,
        'created_at'=>Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Blog Post Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('list.post')->with($notification);
    }//End Method


}
