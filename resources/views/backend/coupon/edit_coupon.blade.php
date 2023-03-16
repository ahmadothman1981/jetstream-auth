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
				  <h3 class="box-title">Edit Coupon </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('coupon.update',$coupons->id) }}" >
	 	@csrf
					   

	 <div class="form-group">
		<h5>Coupon Name  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="coupon_name" class="form-control" value="{{ $coupons->coupon_name }}"> 
	 @error('coupon_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>


	<div class="form-group">
		<h5> Enter Coupon Discount <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="coupon_discount" class="form-control" value="{{$coupons->coupon_discount }}">
     @error('coupon_discount') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>


	<div class="form-group">
		<h5>Coupon Validity  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="coupon_validity" class="form-control" min="{{Carbon\Carbon::now()->format('Y-m-d')}}"  value="{{$coupons->coupon_validity }}">
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
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
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