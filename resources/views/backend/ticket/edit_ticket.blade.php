@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			

			
			

			
			<!-- /.col -->
			<! Ticket Replay-->
				  <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Ticket Replay </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">

 <div class="form-group">
 	<div class="row">
 		<div class="col-md-8">
		<h6 ><span style="font-weight: bold; color: seagreen;">Ticket Number:</span> {{ $ticket->ticket_id  }}  <span class="text-danger">*</span></h6>
		<h6><span style="font-weight: bold; color: seagreen;">Ticket Title:</span>{{ $ticket->title  }} <span class="text-danger">*</span></h6>
		<h6><span style="font-weight: bold; color: seagreen;"> Ticket User Name: </span>{{ $ticket->user->name }}  <span class="text-danger">*</span></h6>
	</div>
	<div class="col-md-4">
		<a  target="_blank" href="{{ asset($ticket->picture) }}"><img src="{{ asset($ticket->picture) }}" width="100px"></a>
	</div>
	</div>
		<p ><span style="font-weight: bold; color: seagreen;">Ticket Original Message:</span>{{ $ticket->message }}</p>
		@foreach($comments as $comment)

		@if(Auth::guard('admin')->user()->id == $comment->user_id)
			<p><span style="font-weight: bold; color: seagreen;"> Admin Message:</span>{{ $comment->comment }}</p>
			@if($comment->picture == null)
			@else
			<a  target="_blank" href="{{ asset($comment->picture) }}"><img src="{{ asset($comment->picture) }}" width="100px"></a>
			@endif
		@else
			<p><span style="font-weight: bold; color: seagreen;"> User Message:</span>{{ $comment->comment }}</p>
			@if($comment->picture == null)
			@else
			<a  target="_blank" href="{{ asset($comment->picture) }}"><img src="{{ asset($comment->picture) }}" width="100px"></a>
			@endif
		
		@endif
		@endforeach
	</div>

 <form method="post" action="{{ route('add-comment') }}" enctype="multipart/form-data" >
	 	@csrf
			
			<input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
			<input type="hidden" name="user_id" value="{{ $ticket->user_id }}">		   



	<div class="form-group">
	<h5> Replay  <span class="text-danger">*</span></h5>	
		<div class="controls">

	 <textarea name="comment" class="form-control" rows="5" required></textarea>
	 @error('comment ') 
	 <span class="text-danger">{{ $comment }}</span>
	 @enderror 
	</div>
	</div>
<div class="row">
	<div class="col-md-4">
<div class="form-group" >
    <h5 style="font-weight: bold;"> Insert Image  <span class="text-danger">*</span></h5>    
        <div class="controls">

      <input type="file" name="picture" class="form-control" onchange="mainThamUrl(this)" >
                    @error('picture') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror<img src="" id="mainThamb">
    </div>
    </div>
</div>
</div>

	
					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Replay">					 
						</div>
					</form>




					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 


		  </div>
		
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  

<script type="text/javascript">
        function mainThamUrl(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#mainThamb').attr('src',e.target.result).width(50).height(50);
                };
                reader.readAsDataURL(input.files[0]);
            }
        };

    </script>


@endsection