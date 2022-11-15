@extends('admin.admin_master')
@section('admin')
 
	  <div class="container-full">
		
		  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Product</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form novalidate>
					  <div class="row">
						<div class="col-12">						
	<div class="row"><!--start 1strow-->
								<div class="col-md-4">
									<div class="form-group">
				<h5>Brand Select <span class="text-danger">*</span></h5>
				<div class="controls">
				<select name="brand_id"   class="form-control">
				<option value="" selected="" disabled="" >Select Category</option>
					@foreach($brands as $brand)
		<option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>
					@endforeach	
					</select>
					@error('brand_id') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror 
				</div>
			</div>	   

								</div><!--end col-md-4-->
								<div class="col-md-4">
									<div class="form-group">
				<h5>Category Select <span class="text-danger">*</span></h5>
				<div class="controls">
				<select name="category_id"   class="form-control">
				<option value="" selected="" disabled="" >Select Category</option>
					@foreach($categories as $category)
		<option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
					@endforeach	
					</select>
					@error('category_id') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror 
				</div>
			</div>	   
								</div><!--end col-md-4-->
								<div class="col-md-4">
									<div class="form-group">
				<h5>SubCategory Select <span class="text-danger">*</span></h5>
				<div class="controls">
				<select name="subcategory_id"   class="form-control">
				<option value="" selected="" disabled="" >Select SubCategory</option>
					
					</select>
					@error('subcategory_id') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror 
				</div>
			</div>	   
								</div><!--end col-md-4-->

								
	</div><!--end 1strow-->


	<div class="row"><!--start 2nd row-->
								<div class="col-md-4">
									<div class="form-group">
				<h5>Sub->SubCategory Select <span class="text-danger">*</span></h5>
				<div class="controls">
				<select name="subsubcategory_id"   class="form-control">
				<option value="" selected="" disabled="" >Select Sub->SubCategory</option>
					
					</select>
					@error('subsubcategory_id') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror 
				</div>
			</div>	   

								</div><!--end col-md-4-->
								<div class="col-md-4">
				<div class="form-group">
					<h5>Product Name EN <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_name_en" class="form-control" >
					@error('product_name_en') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror
						 </div>
				</div>
								</div><!--end col-md-4-->
								<div class="col-md-4">
									<div class="form-group">
					<h5>Product Name AR <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_name_ar" class="form-control" >
					@error('product_name_ar') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror
						 </div>
				</div>
					
								</div><!--end col-md-4-->

								
	</div><!--end 2nd row-->

	<div class="row"><!--start 3rd row-->
								<div class="col-md-4">
				<div class="form-group">
					<h5>Product Code <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_code" class="form-control" >
					@error('product_code') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror
						 </div>
				</div>
								</div><!--end col-md-4-->
								<div class="col-md-4">
				<div class="form-group">
					<h5>Product Quantity <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_qty" class="form-control" >
					@error('product_qty') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror
						 </div>
				</div>
								</div><!--end col-md-4-->
								<div class="col-md-4">
									<div class="form-group">
					<h5>Product Tags EN <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_tags_en" value="Lorem,Ipsum,Amet" data-role="tagsinput" class="form-control" >
					@error('product_tags_en') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror
						 </div>
				</div>
					
								</div><!--end col-md-4-->

								
	</div><!--end 3rd row-->

	<div class="row"><!--start 4th row-->
								<div class="col-md-4">
									<div class="form-group">
					<h5>Product Tags AR <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_tags_ar" value="Lorem,Ipsum,Amet" data-role="tagsinput" class="form-control" >
					@error('product_tags_ar') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror
						 </div>
				</div>
					
								</div><!--end col-md-4-->
								<div class="col-md-4">
				<div class="form-group">
					<h5>Product Size EN <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_size_en" value="Small,Medium,Large" data-role="tagsinput" class="form-control" >
					@error('product_size_en') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror
						 </div>
				</div>
								</div><!--end col-md-4-->
								<div class="col-md-4">
									<div class="form-group">
					<h5>Product Size AR <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_size_ar" value="Small,Medium,Large" data-role="tagsinput" class="form-control" >
					@error('product_size_ar') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror
						 </div>
				</div>
					
								</div><!--end col-md-4-->

								
	</div><!--end 4th row-->


	<div class="row"><!--start 5th row-->
								<div class="col-md-4">
									<div class="form-group">
					<h5>Product Color EN <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_color_en" value="Red,Black,White" data-role="tagsinput" class="form-control" >
					@error('product_color_en') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror
						 </div>
				</div>
					
								</div><!--end col-md-4-->
								<div class="col-md-4">
				<div class="form-group">
					<h5>Product Color AR <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_color_ar" value="Red,Black,White" data-role="tagsinput" class="form-control" >
					@error('product_color_ar') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror
						 </div>
				</div>
								</div><!--end col-md-4-->
								<div class="col-md-4">
									<div class="form-group">
					<h5> Product Selling Price <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="selling_price" class="form-control" >
					@error('selling_price') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror
						 </div>
				</div>
					
								</div><!--end col-md-4-->

								
	</div><!--end 5th row-->



	<div class="row"><!--start 6th row-->
								<div class="col-md-4">
									<div class="form-group">
					<h5>Product Discount price <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="discount_price" class="form-control" >
					@error('discount_price') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror
						 </div>
				</div>
					
								</div><!--end col-md-4-->
								<div class="col-md-4">
				<div class="form-group">
					<h5>Main Tambnail <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="file" name="product_thambnail" class="form-control" >
					@error('product_thambnail') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror
						 </div>
				</div>
								</div><!--end col-md-4-->
								<div class="col-md-4">
									
					<div class="form-group">
					<h5>Multiple Image <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="file" name="multi_image[]" class="form-control" >
					@error('multi_image') 
	 				<span class="text-danger">{{ $message }}</span>
	 				@enderror
						 </div>
				</div>
								</div><!--end col-md-4-->

								
	</div><!--end 6th row-->	



		<div class="row"><!--start 7th row-->
								<div class="col-md-6">
									<div class="form-group">
					<h5>Short Description English <span class="text-danger">*</span></h5>
					<div class="controls">
						<textarea name="short_desc_en" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
					
						 </div>
				</div>
					
								</div><!--end col-md-6-->
								<div class="col-md-6">
				<div class="form-group">
					<h5>Short Description Arabic <span class="text-danger">*</span></h5>
					<div class="controls">
						<textarea name="short_desc_ar" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
					
						 </div>
				</div>
								</div><!--end col-md-6-->
								

								
	</div><!--end 7th row-->	

	<div class="row"><!--start 8th row-->
								<div class="col-md-6">
									<div class="form-group">
					<h5>Long Description English <span class="text-danger">*</span></h5>
					<div class="controls">
						<textarea id="editor1" name="long_desc_en" rows="10" cols="80">
												Long Description English
						</textarea>
					
						 </div>
				</div>
					
								</div><!--end col-md-6-->
								<div class="col-md-6">
				<div class="form-group">
					<h5>Long Description Arabic <span class="text-danger">*</span></h5>
					<div class="controls">
						<textarea id="editor2" name="long_desc_ar" rows="10" cols="80">
												Long Description Arabic
						</textarea>
					
						 </div>
				</div>
								</div><!--end col-md-6-->
								

								
	</div><!--end 8th row-->												
							
							
							
							
							<hr>
						</div>
					  </div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_1" name="hot_deals"  value="1">
											<label for="checkbox_1">Hot Deals</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_2" name="featured" value="1">
											<label for="checkbox_2">Featured</label>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_3" name="spacial_offer" required value="1">
											<label for="checkbox_3">Special Offer</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_4" name="spacial_deals" value="1">
											<label for="checkbox_4">Special Deals</label>
										</fieldset>
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
  



@endsection