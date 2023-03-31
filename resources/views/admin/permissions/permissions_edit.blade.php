@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			

			
			

			
			<!-- /.col -->
			<! Add Role-->
				<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title"> Edit Permission </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <form action="{{ route('permissions.update',$permission->id) }}"  method="post">
						@csrf
					 	<input type="hidden" name="id" value="{{ $permission->id }}">
					 	
										
							
								<div class="form-group">
								<h5>Permission Name <span class="text-danger">*</span></h5>
								<div class="controls">
			<input type="text"  name="name" class="form-control" value="{{ $permission->name }}" >
			@error('name')
			<span class="text-danger">{{ $message }}</span>
			@enderror
							</div>
							</div>

							<div class="form-group">
								<h5>Permission Group <span class="text-danger">*</span></h5>
								<div class="controls">
			<input type="text"  name="group" class="form-control" value="{{ $permission->group }}" >
			@error('group')
			<span class="text-danger">{{ $message }}</span>
			@enderror
							</div>
							</div>
												
						
						<div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5 " value="Update">
						</div>
					</form>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			  
			  <!-- /.box -->          
			</div>
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  
  <!-- /.content-wrapper -->

@endsection