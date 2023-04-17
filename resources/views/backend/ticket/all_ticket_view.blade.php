@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			

			
			

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title"> All Tickets</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Ticket Number</th>
								<td>Image</td>
								<th>Title</th>
								
								<th>Category</th>
								<th>User Name</th>
								<th>Date</th>
								<th>Replay</th>
								<th>Close</th>
								
								
							</tr>
						</thead>
						<tbody>
							@foreach($tickets as $ticket)
							<tr>
								
								<td>{{ $ticket->ticket_id  }}</td>
								<td><img src="{{ asset($ticket->picture ) }}"></td>
								<td>{{ $ticket->title  }}</td>
								
								<td >{{$ticket->category->category_name_en}}</td>
								<td >{{ $ticket->user->name}}</td>
								<td >{{ $ticket->created_at}}</td>
								
									
			@if($ticket->status == 0)
			<td><a href="{{ route('view-ticket',$ticket->id) }}" class="btn btn-danger">view</a></td>	
			<td>Archeived Ticket</td>					
											
							</tr>
			@else					
								<td width="30%">
			<a href="{{ route('replay-ticket',$ticket->id) }}" class="btn btn-primary">Replay</a></td>
									
								
			<td><a href="{{ route('close.ticket',$ticket->id) }}" class="btn btn-danger">Close</a></td>					
							</tr>
			@endif
						@endforeach
						</tbody>
						
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			  
			  <!-- /.box -->          
			</div>
			<!-- /.col -->
			
 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection