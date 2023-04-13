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
								<th>Message</th>
								<th>Category</th>
								<th>User Name</th>
								<th>Status</th>
								<th>Action</th>
								
								
								
							</tr>
						</thead>
						<tbody>
							@foreach($tickets as $ticket)
							<tr>
								
								<td>{{ $ticket->ticket_id  }}</td>
								<td><img src="{{ asset($ticket->picture ) }}"></td>
								<td>{{ $ticket->title  }}</td>
								<td>{{ $ticket->message }}</td>
								<td >{{ $ticket->category->category_name_en}}</td>
								<td >{{ $ticket->user->name}}</td>
								<td >{{ $ticket->status}}</td>
								
									
								
								<td width="35%">
									<a href="" class="btn btn-danger"></a>
								</td>
								
							</tr>
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