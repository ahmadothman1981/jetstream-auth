<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsLetter;
use Carbon\Carbon;

class NewsLetterController extends Controller
{
    public function ViewNews()
    {
     $news = NewsLetter::orderBy('id','DESC')->get();
     
    return view('backend.user.newsletter',compact('news'));
    }//End Method
   
    public function NewsLettertStore(Request $request)
    {

        NewsLetter::insert([
            
            'email'=>$request->email,
            'created_at'=>Carbon::now(),

        ]);
     $notification = array(
            'message' => 'Your Email Entered Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }//End Method

    public function NewsDelete($id)
    {
        NewsLetter::findOrFail($id)->delete();

         $notification = array(
                'message'=> 'newsletter request Deleted Successfully',
                'alert-type' => 'info',
            );

             return redirect()->back()->with( $notification);
    }
}

 

