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
		<h6> Ticket Number:{{ $ticket->ticket_id  }}  <span class="text-danger">*</span></h6>
		<h6> Ticket Title: {{ $ticket->title  }} <span class="text-danger">*</span></h6>
		<h6> Ticket User Name: {{ $ticket->user->name }}  <span class="text-danger">*</span></h6>
		<p style="font-weight: bold; color: blue;">Message:</p><p>{{ $ticket->message }}</p>
	</div>

 <form method="post" action="{{ route('add-comment') }}" >
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
  



@endsection