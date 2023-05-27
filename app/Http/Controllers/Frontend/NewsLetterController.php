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
use Illuminate\Support\Facades\Validator;


class NewsLetterController extends Controller
{
    public function ViewNews()
    {
     $news = NewsLetter::orderBy('id','DESC')->get();
    // dd(Auth::guard('admin')->user());
    return view('backend.user.newsletter',compact('news'));
    }//End Method

    public function NewsLettertStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();
//        $validated = $validator->safe()->only(['email']);

        /******** st old way to store NewsLetter********/
//        $new = NewsLetter::insert([
//            'email'=>$request->email,
//            'created_at'=>Carbon::now(),
//        ]);
//        $news = NewsLetter::latest()->first();
        /******** st old way to store NewsLetter********/
        /******** st new way to store NewsLetter********/
        $newsletter = new NewsLetter;
        $newsletter->email = $validated['email'];
        $newsletter->created_at = Carbon::now();
        $newsletter->save();
        /******** nd new way to store NewsLetter********/
         $users = Admin::orderBy('id','DESC')->get();

        Notification::send($users,new NewUserNotification($newsletter));

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



