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
				  <h3 class="box-title">Coupon List <span class="badge badge-pill badge-danger">{{ count($coupons) }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Coupon Name</th>
								<th>Coupon Discount</th>
								<th>Coupon Type</th>
								<th>Coupon Category</th>
								<th>Coupon Counting</th>
								<th>Coupon Validity</th>

								<th>Status</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($coupons as $item)
							<tr>
								
								<td>{{ $item->coupon_name  }}</td>
								@if( $item->coupon_type == 'PERCENTAGE')
								<td>{{ $item->coupon_discount  }}% </td>
								@else
								<td>{{ $item->coupon_discount  }}</td>
								@endif
								<td>{{ $item->coupon_type  }}</td>
								
								<td>{{ $item->category->category_name_en }}</td>
								<td>{{ $item->counting }}</td>
								<td width="35%">
									{{Carbon\Carbon::parse($item->coupon_validity)->format('D ,d F Y')}}
									</td>
								<td >
									@if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
										<span class="badge badge-pill badge-success">Valide</span>
									@else
									<span class="badge badge-pill badge-danger">Invalid</span>
									@endif
								</td>
								<td width="35%"><a href="{{ route('coupon.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
									<a href="{{ route('coupon.delete',$item->id) }}" id="delete" class="btn btn-danger" title="Delete Data"> <i class="fa fa-trash"></i></a>
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
			<! Add Category-->
				  <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Coupon </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('coupon.store') }}" >
	 	@csrf
					   

	 <div class="form-group">
		<h5>Coupon Name  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="coupon_name" class="form-control" > 
	 @error('coupon_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>


	<div class="form-group">
		<h5> ENTER Coupon Discount <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="coupon_discount" class="form-control" >
     @error('coupon_discount') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>


	<div class="form-group">
		<h5>Coupon Validity  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="coupon_validity" class="form-control" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" >
     @error('coupon_validity') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div> 

	@php
 $categories = App\Models\Category::latest()->get();
@endphp
	<div class="form-group">
				<h5>Category Select <span class="text-danger">*</span></h5>
				<div class="controls">
				<select name="category_id"   class="form-control" required="">
				<option value="" selected="" disabled="" >Select Category</option>
					@foreach($categories as $category)
		<option value="{{ $category->id }}"> {{ $category->category_name_en }}</option>
					@endforeach	
					</select>
					@error('category_id') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror 
				</div>
			</div>	  

			<div class="form-group">
				<h5>Coupon Type <span class="text-danger">*</span></h5>
				<div class="controls">
				<input type="radio" id="fixed" name="coupon_type" value="FIXED">
				<label for="fixed">FIXED</label><br>

				<input type="radio" id="percentage"  name="coupon_type" value="PERCENTAGE">
				<label for="percentage">PERCENTAGE</label><br>
					@error('coupon_type') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror 
				</div>
			</div>
					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">					 
						</div>
					</form>




					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection