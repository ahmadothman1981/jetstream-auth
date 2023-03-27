@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			

			
			

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title"> Permissions<span class="badge badge-pill badge-danger">{{ count($permissions) }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Permissions</th>
								<th>Status</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($permissions as $permission)
							<tr>
								
								<td>{{ $permission->name }}</td>
								<td>{{ $permission->status }}</td>
								<td>
									<a href="{{ route('permissions.edit',$permission->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
									<a href="" id="delete" class="btn btn-danger" title="Delete Data"> <i class="fa fa-trash"></i></a>
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
			<! Add Permission-->
				<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Permission List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <form action="{{ route('permissions.store') }}"  method="post">
						@csrf
					 
										
							
								<div class="form-group">
								<h5>Permission Name <span class="text-danger">*</span></h5>
								<div class="controls">
			<input type="text"  name="name" class="form-control" >
			@error('name')
			<span class="text-danger">{{ $message }}</span>
			@enderror
							</div>
							</div>							
												
							
						
						
						<div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5 " value="Add New">
						</div>
					</form>
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
  
  <!-- /.content-wrapper -->

@endsection