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

class CommentController extends Controller
{
   public function AddComment(Request $request )
   {
//dd($request->all());
    
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

      $comment = comment::create([
        'ticket_id'=>$request->input('ticket_id'),
        'user_id'=>Auth::guard('admin')->user()->id,
        'comment'=>$request->comment,
        'picture'=>$save_url ,

    ]);
        }else{

             $comment = comment::create([
        'ticket_id'=>$request->input('ticket_id'),
        'user_id'=>Auth::guard('admin')->user()->id,
        'comment'=>$request->comment,
        

    ]);
        }
    

     $notification = array(
            'message' => 'Your Repaly Placed  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
   }
}
