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
				  <h3 class="box-title"> Archeived Ticket ID :{{ $ticket->ticket_id  }}   </h3>
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
		@else
			<p><span style="font-weight: bold; color: seagreen;"> User Message:</span>{{ $comment->comment }}</p>
		
		@endif
		@endforeach
	</div>

 




					  
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
  



@endsection