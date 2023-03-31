@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
 <style>
.toggler-wrapper {
	display: block;
	width: 45px;
	height: 25px;
	cursor: pointer;
	position: relative;
}

.toggler-wrapper input[type="checkbox"] {
	display: none;
}

.toggler-wrapper input[type="checkbox"]:checked+.toggler-slider {
	background-color: #44cc66;
}

.toggler-wrapper .toggler-slider {
	background-color: #ccc;
	position: absolute;
	border-radius: 100px;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	-webkit-transition: all 300ms ease;
	transition: all 300ms ease;
}

.toggler-wrapper .toggler-knob {
	position: absolute;
	-webkit-transition: all 300ms ease;
	transition: all 300ms ease;
}			 		
.toggler-wrapper.style-4 input[type="checkbox"]:checked+.toggler-slider .toggler-knob {
	left: calc(100% - 19px - 3px);
}

.toggler-wrapper.style-4 .toggler-knob {
	width: 25px;
	height: 25px;
	border-radius: 50%;
	left: 0;
	top: 0;
	background-color: #fff;
	-webkit-box-shadow: 0 2px 6px rgba(153, 153, 153, 0.75);
	box-shadow: 0 2px 6px rgba(153, 153, 153, 0.75);
}


</style> 
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
				  <h3 class="box-title"> Edit Role </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <form action="{{ route('role.update',$role->id) }}"  method="post">
						@csrf
					 	<input type="hidden" name="id" value="{{ $role->id }}">
					 	
										
							
								<div class="form-group">
								<h5>Role Name <span class="text-danger">*</span></h5>
								<div class="controls">
			<input type="text"  name="name" class="form-control" value="{{ $role->name }}" >
			@error('name')
			<span class="text-danger">{{ $message }}</span>
			@enderror
							</div>
							</div>

			@foreach($permissions_group as $item)
<h4> <span class="badge badge-primary">{{ $item->group }}</span></h4> 
@foreach($permissions as $premission)
              
    @if($item->group == $premission->group)
    <div class="badge">{{ $premission->name }}</div>
      </div>
      <div>
        <!-- Toggle Button Style 5 -->
        <label class="toggler-wrapper style-5">
<input type="checkbox" name="permission[]"  value="{{ $premission->name }}"
{{ $role->hasPermissionTo($premission->name) ? 'checked' : '' }}
  >

          <div class="toggler-slider">
            <div class="toggler-knob"></div>
          </div>
        </label>
        @else	
    @endif           


 
								
		@endforeach				
	@endforeach						
				
												
						
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