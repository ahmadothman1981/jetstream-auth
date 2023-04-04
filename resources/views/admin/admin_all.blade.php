@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			
@php
  $admins = \app\Models\Admin::latest()->get();
@endphp
			
			

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title"> Total Admin <span class="badge badge-pill badge-danger">{{ count($admins)}}</span></h3>
				  <a href="{{ route('add.admin') }}" class=" btn btn-danger" style="float: right;">Add Admin User</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>status</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($admins as $admin)
							<tr>
								<td><img src="{{(!empty($admin->profile_photo_path))? url('upload/admin_images/'.$admin->profile_photo_path):url('upload/no_image.jpg') }}" style="width: 70px;height: 40px;"></td>
								<td>{{ $admin->name }}</td>
								<td>{{ $admin->email }}</td>
								<td>{{ $admin->phone }}</td>

								<td>
								@if($admin->AdminOnline())

						<span class="badge badge-pill badge-success">Active Now</span>

								@else
						<span class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($admin->last_seen)->diffForHumans() }}</span>

								@endif

								</td>
								
								<td>
									<a href="{{ route('edit.admin',$admin->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
									<a href="{{ route('admin.delete',$admin->id) }}" id="delete" class="btn btn-danger" title="Delete Data"> <i class="fa fa-trash"></i></a>
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
  
  <!-- /.content-wrapper -->

@endsection