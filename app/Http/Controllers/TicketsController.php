<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Category;
use App\Models\Ticket;
use Carbon\Carbon;
use Image;
use Auth;

class TicketsController extends Controller
{
    public function ViewTickets()
    {
        $tickets = Ticket::orderBy('id','DESC')->get();

    return view('backend.ticket.all_ticket_view',compact('tickets'));
    }//end method

    public function ApplyTickets()
    {
        $categories = Category::orderBy('id','DESC')->get();
        return view('frontend.ticket.apply_ticket',compact('categories'));
    }//end method

    public function StoreTickets(Request $request)
    {
       
     /*   $request->validate([
            'file'=> 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',

        ]);*/
        
        $image = $request->file('picture');
      $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(225,225)->save('upload/tickets/'.$name_gen);
      $save_url = 'upload/tickets/'.$name_gen; 
//dd($save_url);

      Ticket::insert([
         'ticket_id'=> mt_rand(100, 999),
         'user_id'=> Auth::id(),
         'picture'=> $save_url,
         'title'=>$request->title,
         'message'=>$request->message,
         'category_id'=>$request->category_id,
         'status'=>"1",
        'created_at'=>Carbon::now(),

      ]);

       $notification = array(
            'message' => 'Ticket Placed  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }//end method

    
}
