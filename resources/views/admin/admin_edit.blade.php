@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container-full">
<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin Edit</h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('admin.update',$admin->id) }}"  method="post" enctype="multipart/form-data">
						@csrf
					<input type="hidden" name="old_image" value="{{ $admin->profile_photo_path}}">
					<input type="hidden" name="id" value="{{$admin->id}}">
					  <div class="row">
						<div class="col-12">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<h5>Admin User Name <span class="text-danger">*</span></h5>
								<div class="controls">
				<input type="text" name="name" class="form-control" required="" value="{{ $admin->name }}" >
							</div>
							</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
								<h5>Admin Email  <span class="text-danger">*</span></h5>
								<div class="controls">
		<input type="email" name="email" class="form-control" required="" value="{{ $admin->email }}">
							</div>
							</div>
							</div>
												
						</div>						
							<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<h5>Admin Password <span class="text-danger">*</span></h5>
								<div class="controls">
			<input type="password" name="password" class="form-control" required=""  >
							</div>
							</div>
							</div>

						 	<div class="col-md-6">
									<div class="form-group">
				<h5>Role Select  <span class="text-danger">*</span></h5>
				<div class="controls">
				<select name="role_name"   class="form-control" required="">
				<option value=" " selected="" disabled="" >Select Role</option>
					@foreach($roles as $role)
		<option value="{{$role->name}}" >{{$role->name}}</option>
					@endforeach	
					</select>
					@error('role') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror 
				</div>
			</div>	   

								</div>
							
						</div>	
							<div class="row">
							<div class="col-md-6"> 
								<div class="form-group">
								<h5>Admin Image <span class="text-danger">*</span></h5>
								<div class="controls">
		<input type="file" name="profile_photo_path" class="form-control"  id="image"> </div>
							</div>	


							</div>

								<div class="col-md-6">
<img id="showimage" style="width: 100px; height: 100px;"  class="rounded-circle" src="{{ url('upload/no_image.jpg') }}" >
								</div>

						    </div>
							
							
							
						</div>
						</div>
						<div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5 " value="Update Admin">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
</div>


<script type="text/javascript">
	
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showimage').attr('src',e.target.result);
			};
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

@endsection