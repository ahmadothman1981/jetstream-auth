<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\comment;
use Auth;

class CommentController extends Controller
{
   public function AddComment(Request $request )
   {

    
    $this->validate($request, [
            'comment' => 'required'
        ]);
    $comment = comment::create([
        'ticket_id'=>$request->input('ticket_id'),
        'user_id'=>$request->input('user_id'),
        'comment'=>$request->comment,

    ]);

     $notification = array(
            'message' => 'Your Repaly Placed  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
   }
}
