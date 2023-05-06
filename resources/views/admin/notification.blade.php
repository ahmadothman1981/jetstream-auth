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
								<th>Email</th>
								
								
								
								
								
								
							</tr>
						</thead>
						<tbody>
						@foreach($obj as  $key=> $value)
								@php
								$new_obj = json_decode($value, true);
								@endphp
						
						
							<tr>
								
								<td>{{ $new_obj['name']  }}</td>
								
								
								
								
								<td>{{ $new_obj['email']   }}</td>
								
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