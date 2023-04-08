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
				  <h3 class="box-title"> Blog Post List <span class="badge badge-pill badge-danger">{{ count($blogpost) }}</span></h3>
				  @if(Auth::guard('admin')->user()->can('Blog_create'))
				  <a href="{{ route('add.post') }}"  class="btn btn-success" style="float: right;"> Add Post</a>
				  @endif
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								
								<th>Post Category </th>
								<th>Post image</th>
								<th>Post Title EN</th>
								<th>Post Title AR</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($blogpost as $item)
							<tr>
								
								<td>{{ $item->category->blog_category_name_en }}</td>
								<td><img src="{{ asset($item->post_image) }}" style="width: 60px; height=:60px "></td>
								<td>{{ $item->post_title_en  }}</td>
								<td>{{ $item->post_title_ar  }}</td>
								
				
									<td width="20%">
@if(Auth::guard('admin')->user()->can('Blog_delete'))
										<a href="{{ route('blog.category.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
									<a href="{{ route('blog.category.delete',$item->id) }}" id="delete" class="btn btn-danger" title="Delete Data"> <i class="fa fa-trash"></i></a>
									@endif	
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
			


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection