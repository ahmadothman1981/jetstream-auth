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
				  <h3 class="box-title">Brand List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Brand En</th>
								<th>Brand Ar</th>
								<th>Image</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($brands as $item)
							<tr>
								<td>{{ $item->brand_name_en }}</td>
								<td>{{ $item->brand_name_ar }}</td>
								<td><img src="{{ asset($item->brand_image) }}" style="width: 70px;height: 40px;"></td>
								<td>
									<a href="" btn btn-info>Edite</a>
									<a href="" btn btn-danger> Delete</a>
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
			<! Add Brand-->
				<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Brand List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <form action="{{ route('update.change.password') }}"  method="post" >
						@csrf
					 
										
							
								<div class="form-group">
								<h5>Brand Name English <span class="text-danger">*</span></h5>
								<div class="controls">
				<input type="text"  name="brand_name_en" class="form-control"  >
							</div>
							</div>
							

								
								<div class="form-group">
								<h5>Brand Name Arabic <span class="text-danger">*</span></h5>
								<div class="controls">
				<input type="text"  name="brand_name_ar" class="form-control"   >
							</div>
							</div>
							

								
								<div class="form-group">
								<h5>Image <span class="text-danger">*</span></h5>
								<div class="controls">
				<input type="file"  name="brand_image" class="form-control" required=""  >
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