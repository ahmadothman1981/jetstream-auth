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
				  <h3 class="box-title">Total Admin User</h3>
				  <a href="{{ route('add.admin') }}" class="btn btn-danger" style="float: right;">Add Admin User</a>
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
								<th>Access</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($adminuser as $item)
							<tr>
								
								<td><img src="{{ asset($item->profile_photo_path) }}" style="width: 50px; height:50px; "></td>
								<td>{{ $item->name  }}</td>
								<td>{{ $item->email }}</td>
								<td >
									@if($item->brand == 1)
									<span class="badge btn-primary">Brand</span>
									@else
									@endif

									@if($item->category == 1)
									<span class="badge btn-secondary">category</span>
									@else
									@endif

									@if($item->product == 1)
									<span class="badge btn-danger">product</span>
									@else
									@endif

									@if($item->slider == 1)
									<span class="badge btn-success">slider</span>
									@else
									@endif

									@if($item->coupons == 1)
									<span class="badge btn-warning">coupons</span>
									@else
									@endif

									@if($item->shipping == 1)
									<span class="badge btn-info">shipping</span>
									@else
									@endif

									@if($item->blog == 1)
									<span class="badge btn-light">blog</span>
									@else
									@endif

									@if($item->setting == 1)
									<span class="badge btn-dark">setting</span>
									@else
									@endif

									@if($item->returnorder == 1)
									<span class="badge btn-secondary">returnorder</span>
									@else
									@endif

									@if($item->review == 1)
									<span class="badge btn-info">review</span>
									@else
									@endif

									@if($item->orders == 1)
									<span class="badge btn-warning">orders</span>
									@else
									@endif

									@if($item->stock == 1)
									<span class="badge btn-success">stock</span>
									@else
									@endif

									@if($item->reports == 1)
									<span class="badge btn-dark">reports</span>
									@else
									@endif

									@if($item->alluser == 1)
									<span class="badge btn-danger">alluser</span>
									@else
									@endif

									@if($item->adminuserrole == 1)
									<span class="badge btn-light">adminuserrole</span>
									@else
									@endif

								</td>
		
									
								
								<td width="35%"><a href="{{ route('edit.admin.user',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
									<a href="{{ route('delete.admin.user',$item->id) }}" id="delete" class="btn btn-danger" title="Delete"> <i class="fa fa-trash"></i></a>
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