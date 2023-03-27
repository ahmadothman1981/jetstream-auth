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
				  <h3 class="box-title"> Roles<span class="badge badge-pill badge-danger">{{ count($roles) }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>ID</th>
								<th>Status</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($roles as $role)
							<tr>
								<td>{{ $role->name }}</td>
								<td>{{ $role->id }}</td>
								<td>{{ $role->Status }}</td>
								
								<td>
									<a href="{{ route('role.edit',$role->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
									<a href="{{ route('role.delete',$role->id) }}" id="delete" class="btn btn-danger" title="Delete Data"> <i class="fa fa-trash"></i></a>
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

			<! Add Role-->
				<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Role List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <form action="{{ route('role.store') }}"  method="post">
						@csrf
					 
										
							
								<div class="form-group">
								<h5>Role Name <span class="text-danger">*</span></h5>
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