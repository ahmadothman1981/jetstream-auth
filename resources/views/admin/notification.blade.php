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
								<th>Email</th>
								<th>Created_at</th>
								<th>Info</th>
								
								
								
								
							</tr>
						</thead>
						<tbody>
						
							<tr>
								
								<td>{{ $new_obj['email']  }}</td>
								<td>{{ $new_obj['created_at']  }}</td>
								
									<td><a href="{{route($new_obj['url'])}}">{{ $new_obj['name']  }}</a></td>
							
							
								
								
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