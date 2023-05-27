<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\comment;
use Auth;
use Carbon\Carbon;
use Image;
use Illuminate\Validation\Rule;
use File;
use Response;


class CommentController extends Controller
{
   public function AddComment(Request $request )
   {
dd($request->all());
    
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

    $new_comment = $comment = comment::create([
        'ticket_id'=>$request->input('ticket_id'),
        'user_id'=>Auth::guard('admin')->user()->id,
        'comment'=>$request->comment,
        'picture'=>$save_url ,

    ]);
        }else{

       $new_comment = $comment = comment::create([
                 'ticket_id'=>$request->input('ticket_id'),
                 'user_id'=>Auth::guard('admin')->user()->id,
                 'comment'=>$request->comment,
        

    ]);
        }
    

   /* $notification = array(
            'message' => 'Your Request Inserted Successfully',
            'alert-type' => 'success'
        );*/


       // return redirect()->back()->with($notification);
     return response()->json(['id'=>$new_comment->id,
                               'comment'=>$new_comment->comment,
                                'picture'=>$new_comment->picture,]);
   }//End Method

   public function ajaxTest(Request $request)
{
    if($request->ajax()){
        return response()->json(['success'=>'Ajax request submitted successfully']);
    }
}




   


  
}
