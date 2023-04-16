@extends('frontend.main_master')
@section('content')

 <div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-3">
                
                               <p style="color: green; font-weight: bold; margin-left: 25px;margin-bottom: 10px; margin-top: 10px;"> Ticket Number:{{ $comment->ticket->ticket_id }}</p>
                                <p style="color: green; font-weight: bold; margin-left: 25px;"> Ticket Title: {{ $comment->ticket->title }} </p> 
                           


                           
                              
                                                      
            </div>
            <div class="col-md-8">

                <div class="table-responsive">
                    <table class="table" >
                          


                             <tr  >
                                <th>Ticket Image</th>
                                <th><img src="{{asset($comment->ticket->picture)}}" width="75px"></th>
                            </tr>



                              <tr>
                                <th>My Message</th>
                                <th>{{ $comment->ticket->message }}</th>
                            </tr>

                            <tr>
                                <th>Admin Message</th>
                                <th>{{ $comment->comment }}</th>
                            </tr>
                        </table>
                </div><!--end table-responsive-->



            </div><!--end col-md-8-->




             
        </div><!--end row-->
        <form method="post" action="{{ route('replay-to-admin') }}" style="margin-left: 230px;">
        @csrf
            
            <input type="hidden" name="ticket_id" value="{{ $comment->ticket_id }}">
            <input type="hidden" name="user_id" value="{{ $comment->user_id}}">
            <input type="hidden" name="title" value="{{ $comment->ticket->title }}">
            <input type="hidden" name="picture" value="{{$comment->ticket->picture}}">
            <input type="hidden" name="category_id" value="{{$comment->ticket->category_id}}">




    <div class="form-group" >
    <h5 style="font-weight: bold;"> Replay  <span class="text-danger">*</span></h5>    
        <div class="controls">

     <textarea name="message" class="form-control" rows="5" required></textarea>
     @error('message ') 
     <span class="text-danger">{{ $message }}</span>
     @enderror 
    </div>
    </div>


    
                     

             <div class="text-xs-right" >
    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Replay" style="margin-bottom: 20px;">
    </div>
    </form>
</div>

@endsection