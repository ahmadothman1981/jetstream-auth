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
				  <h3 class="box-title">Notification</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">

						<thead>
							<tr>
								<th>Name</th>
								<th>Notification:ID</th>
								<th>USER:ID</th>
								
								
								
								
								
							</tr>
						</thead>
						<tbody>
						@foreach($obj_data as $data)
								@php
								$new_data = json_decode($data, true);
								@endphp
								@foreach($obj_id as $id)
								@foreach($user_id as $user)
							<tr>
								
								<td>{{ $new_data['name']  }}</td>
								
								
								
								
								<td>{{ $id  }}</td>
								<td>{{$user }}</td>
								@endforeach
								@endforeach
								@endforeach
							
							
								
								
							</tr>
						
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