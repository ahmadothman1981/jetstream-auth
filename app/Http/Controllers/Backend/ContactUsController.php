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

    public function index()
    {
        $contacts = Contact::orderBy('id','DESC')->get();
        return view('backend.contact.index',compact('contacts'));
    }//End Method

    public function view($id)
    {
        $contact = Contact::findOrFail($id);
        return view('backend.contact.contact_view',compact('contact'));
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

        /******** st new way to store Contact ********/
        $contact = new Contact;
        $contact->name       = $request->name;
        $contact->email      = $request->email;
        $contact->phone      = $request->phone;
        $contact->comment    = $request->comment;
        $contact->created_at = Carbon::now();
        $contact->save();
        /******** nd new way to store Contact ********/

    $users = Admin::orderBy('id','DESC')->get();
     Notification::send($users,new ContactUsNotification($contact));
     $notification = array(
            'message' => 'Your Request Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }//End Method




}
