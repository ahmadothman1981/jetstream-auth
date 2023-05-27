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
				  <h3 class="box-title">Contact User</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Comment</th>
								<th>Created Time</th>
								<th>Action</th>
								
								
							</tr>
						</thead>
						<tbody>
							@foreach($contacts as $contact)
							<tr>
								
								<td>{{ $contact->name  }}</td>
								<td>{{ $contact->email  }}</td>
								<td>{{ $contact->phone }}</td>
								<td >{{ $contact->comment }}</td>
								<td >{{ $contact->created_at }}</td>
								
									
								
								<td width="35%">
				<a href="{{ route('contact.delete',$contact->id) }}" class="btn btn-danger" id="delete">Delete</a>
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