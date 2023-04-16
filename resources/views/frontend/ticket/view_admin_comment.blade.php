@extends('frontend.main_master')
@section('content')

 <div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-3">
                
                               <p style="color: green; font-weight: bold; margin-left: 25px;margin-bottom: 10px; margin-top: 10px;"> Ticket Number:{{ $ticket->ticket_id }}</p>
                                <p style="color: green; font-weight: bold; margin-left: 25px;"> Ticket Title: {{ $ticket->title }} </p> 
                           


                           
                              
                                                      
            </div>
            <div class="col-md-8">

                <div class="table-responsive">
                    <table class="table" >
                          


                             <tr  >
                                <th>Ticket Image</th>
                                <th><img src="{{asset($ticket->picture)}}" width="75px"></th>
                            </tr>



                              <tr>
                                <th>Ticket Message</th>
                                <th>{{ $ticket->message }}</th>
                            </tr>
@foreach($comments as $comment)

@if(Auth::id()==$comment->user_id)
                            <tr>
                                <th>User Message</th>
                                <th>{{ $comment->comment }}</th>
                                 </tr>
@else
                                <tr>
                                <th>Admin Message</th>
                                <th>{{ $comment->comment }}</th>
                                 </tr>
@endif
@endforeach
                        </table>
                </div><!--end table-responsive-->



            </div><!--end col-md-8-->




             
        </div><!--end row-->
        <form method="post" action="{{ route('replay-to-admin') }}" style="margin-left: 230px;">
        @csrf
            
            <input type="hidden" name="ticket_id" value="{{ $comment->ticket_id }}">
           




    <div class="form-group" >
    <h5 style="font-weight: bold;"> Replay  <span class="text-danger">*</span></h5>    
        <div class="controls">

     <textarea name="comment" class="form-control" rows="5" required></textarea>
     @error('comment') 
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