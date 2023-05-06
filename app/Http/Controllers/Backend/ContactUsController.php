<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;
use App\Models\Admin;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactUsNotification;


class ContactUsController extends Controller
{

    public function ContactView()
    {
        $contacts = Contact::orderBy('id','DESC')->get();
        return view('backend.contact.contact_view',compact('contacts'));
    }//End Method
    
    public function ContactDelete($id)
    {
      Contact::findOrFail($id)->delete();
       $notification = array(
                'message'=> 'Comment Deleted Successfully',
                'alert-type' => 'info',
            );

             return redirect()->back()->with( $notification);   
    }//End Method


    public function ViewContact()
    {
        
        return view('frontend.contact.contact_us');
    }//End Method

    public function ContactStore(Request $request)
    {
//dd($request->all());
      $contact = Contact::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'comment'=>$request->comment,
            'created_at'=>Carbon::now(),

        ]);

    $users = Admin::orderBy('id','DESC')->get();
     $contactus = Contact::latest()->first();  
     Notification::send($users,new ContactUsNotification($contactus));  
     $notification = array(
            'message' => 'Your Request Inserted Successfully',
            'alert-type' => 'success'
        );
 
        return redirect()->back()->with($notification);
    }//End Method

    


}
