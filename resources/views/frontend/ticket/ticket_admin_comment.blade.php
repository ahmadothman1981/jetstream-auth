@extends('frontend.main_master')
@section('content')

 <div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-1">
                
            </div>
            <div class="col-md-8">

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                           <tr style="background: darkgray;">
                            <td class="col-md-1">
                                <label for="">User Name</label>
                            </td>

                            <td class="col-md-3">
                                <label for="">Ticket Name</label>
                            </td>

                            <td class="col-md-3">
                                <label for="">Comment</label>
                            </td>

                          
                           </tr> 


                            @foreach($comments as $comment)

                             <tr >
                            <td class="col-md-1">
                                <label for="">{{ $comment->user->name}}</label>
                            </td>

                            <td class="col-md-3">
                                <label for="">{{$comment->ticket->title}}</label>
                            </td>

                            <td class="col-md-2">
                                <label for="">{{$comment->comment }}</label>
                            </td>

                           
                            

                            <td class="col-md-1">
                                <a href="{{ route('viewadmin-replay',$comment->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>View</a>
                               
                            </td>
                               
                           </tr> 
                           @endforeach
                        </tbody>
                    </table>
                </div><!--end table-responsive-->



            </div><!--end col-md-8-->




             
        </div><!--end row-->
    </div>
    
</div>

@endsection