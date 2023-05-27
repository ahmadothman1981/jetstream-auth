<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
      <!-- Sidebar toggle button-->
	  <div>
		  <ul class="nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
					<i class="nav-link-icon mdi mdi-menu"></i>
			    </a>
			</li>
			<li class="btn-group nav-item">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
					<i class="nav-link-icon mdi mdi-crop-free"></i>
			    </a>
			</li>			
			<li class="btn-group nav-item d-none d-xl-inline-block">
				<a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="">
					<i class="ti-check-box"></i>
			    </a>
			</li>
			<li class="btn-group nav-item d-none d-xl-inline-block">
				<a href="calendar.html" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="">
					<i class="ti-calendar"></i>
			    </a>
			</li>
		  </ul>
	  </div>
		
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
		  <!-- full Screen -->
	     
		  <!-- Notifications -->
		  <li class="dropdown notifications-menu">
			<a href="#" class="waves-effect waves-light rounded dropdown-toggle" data-toggle="dropdown" title="Notifications"><span  class="badge badge-pill badge-danger">{{Auth::guard('admin')->user()->unreadNotifications->count()}}</span>
			  <i class="ti-bell"></i> 
			</a>
			<ul class="dropdown-menu animated bounceIn">
		
			  <li class="header">
				<div class="p-20">
					<div class="flexbox">
						<div>
<h4 class="mb-0 mt-0">Notifications({{Auth::guard('admin')->user()->unreadNotifications->count()}})</h4>
						</div>
						<div>
							<a href="#" class="text-danger">Clear All</a>
						</div>
					</div>
				</div>
			  </li>
@php
$notifications = DB::table('notifications')->where('notifiable_id',Auth::guard('admin')->user()->id)->orderBy('created_at','DESC');
$data = $notifications->pluck('data');



@endphp
			  <li>
				<!-- inner menu: contains the actual data -->
				<ul class="menu sm-scrol">
				@foreach($data as $item)
				@php
          $new_item = json_decode($item, true);
          $id = $new_item['id'];
 					$url = $new_item['url'];
				@endphp
				  <li>
					@if(is_int($id))
			<a href="{{route($url,$id)}}">
		<i class="fa fa-users text-info"></i> {{$new_item['name']}}**{{$new_item['created_at']}}
					</a>
				@else
		<a href="{{route($url)}}">
		<i class="fa fa-users text-info"></i> {{$new_item['name']}}**{{$new_item['created_at']}}
					</a>
 				@endif
					  
				  </li>
				  @endforeach 
				</ul>
			  </li>

			  <li class="footer">
				  <a href="{{ route('view.notification')}}">View all</a>
			  </li>
			</ul>
		  </li>	
		  @php 
		  	$adminData = DB::table('admins')->first();
		  @endphp
	      <!-- User Account-->
          <li class="dropdown user user-menu">	
			<a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
				<img src="{{ (!empty($adminData->profile_photo_path))?
				 url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg') }}" alt="">
			</a>
			<ul class="dropdown-menu animated flipInX">
			  <li class="user-body">
				 <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ti-user text-muted mr-2"></i> Profile</a>
				 <a class="dropdown-item" href="{{ route('admin.change.password') }}"><i class="ti-wallet text-muted mr-2"></i> Change Password</a>
				 <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i> Settings</a>
				 <div class="dropdown-divider"></div>
				 <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="ti-lock text-muted mr-2"></i> Logout</a>
			  </li>
			</ul>
          </li>	
		  <li>
              
          </li>
			
        </ul>
      </div>
    </nav>
  </header>