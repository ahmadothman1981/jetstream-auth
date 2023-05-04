<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsLetter;
use App\Models\User;
use App\Models\Admin;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewUserNotification;

class NewsLetterController extends Controller
{
    public function ViewNews()
    {
     $news = NewsLetter::orderBy('id','DESC')->get();
     
    return view('backend.user.newsletter',compact('news'));
    }//End Method
   
    public function NewsLettertStore(Request $request)
    {

      $new = NewsLetter::insert([
            
            'email'=>$request->email,
            'created_at'=>Carbon::now(),

        ]);
       // $id = Auth::user()->id;
        $users = Admin::where('id','!=',auth()->user()->id)->get();
        $news = NewsLetter::latest()->first();
       
    Notification::send($users,new NewUserNotification($news));

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

 

