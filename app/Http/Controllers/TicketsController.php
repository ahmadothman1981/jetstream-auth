<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\comment;
use Carbon\Carbon;
use Image;
use Auth;
use Response;
use File;

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
            'picture'=> 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',

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

    public function ReplayTickets($id)
    {
        $ticket = Ticket::findOrFail($id);
        $comments = comment::where('ticket_id',$ticket->id)->orderBy('created_at','ASC')->get();
       // dd($comments);
        //$this->downloadFunction($comments);
        return view('backend.ticket.edit_ticket',compact('ticket','comments'));
    }//end method


     public function AdminReplay()
    {
       $tickets = Ticket::orderBy('id','DESC')->get();
//dd($comments);

    return view('frontend.ticket.ticket_admin_comment',compact('tickets'));
    }//end method

    public function ViewAdminReplay($id)
    {
      // $comment = comment::findOrFail($id);
       $ticket = Ticket::findOrFail($id);
       $comments = comment::where('ticket_id',$ticket->id)->orderBy('created_at','ASC')->get(); 
      


       return view('frontend.ticket.view_admin_comment',compact('ticket','comments'));
    }//end method

    public function ReplayToAdmin(Request $request)
    {

      
       $this->validate($request, [
            'comment' => 'required',
            'ticket_id'=>[
                'numeric',
                'exists:App\Models\Ticket,id',
            ]
        ]);
       if($request->file('picture'))
       {
        $image = $request->file('picture');
      $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(225,225)->save('upload/tickets/comments/'.$name_gen);
      $save_url = 'upload/tickets/comments/'.$name_gen; 

      $replay = comment::create([
        'ticket_id'=>$request->input('ticket_id'),
        'user_id'=>Auth::id(),
        'comment'=>$request->comment,
        'picture'=>$save_url,
        'created_at'=>Carbon::now(),

    ]);
       }else{
        $replay = comment::create([
        'ticket_id'=>$request->input('ticket_id'),
        'user_id'=>Auth::id(),
        'comment'=>$request->comment,
        'created_at'=>Carbon::now(),
        ]);
       }
       


    

     $notification = array(
            'message' => 'Your Repaly Placed  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
   
    }//end method

    public function CloseTicket($id)
    {
         Ticket::findOrFail($id)->update([
            'status'=> 0,
         ]);

          $notification = array(
            'message' => 'Ticket has been archeived',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);


    }//end method

    public function ViewArcheivedTickets($id)
    {
        $ticket = Ticket::findOrFail($id);
        $comments = comment::where('ticket_id',$ticket->id)->orderBy('created_at','ASC')->get();
        //dd($comments);
        return view('backend.ticket.archeived_ticket',compact('ticket','comments'));
    }//end method

     public function downloadfile($pic_id)
    {
        $image = comment::where('id',$pic_id)->first();
        
        $filepath = $image->picture;
        
       // $filepath = public_path($pic_name);
        
        return Response::download($filepath); 
    }



    
}
