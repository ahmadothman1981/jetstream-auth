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
				  <h3 class="box-title">Notification</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">

{{----------------------------------------------------------- start old way ----------------------}}

{{--						<thead>--}}
{{--							<tr>--}}
{{--								<th>Name</th>--}}
{{--								<th>Email</th>--}}
{{--								<th>Details</th>--}}
{{--							</tr>--}}
{{--						</thead>--}}
{{--						<tbody>--}}
{{--						@foreach($obj as  $key=> $value)--}}
{{--								@php--}}
{{--								$new_obj = json_decode($value, true);--}}
{{--								@endphp--}}
{{--							<tr>--}}

{{--								<td>{{ $new_obj['name']  }}</td>--}}
{{--								<td>{{ $new_obj['email']   }}</td>--}}
{{--								<td>{{$new_obj['Details']??''}}--}}
{{--                                    --}}
{{--                                 @php--}}
{{--                                 $id = $new_obj['id']??'';--}}
{{--                                 $url = $new_obj['url']??'';--}}
{{--                                @endphp--}}
{{--                                @if(is_int($id))--}}
{{--                                <a class="btn btn-danger" href="{{route($url,$id)}}">Details</a>--}}
{{--                                @else--}}
{{--                                <a class="btn btn-danger" href="{{route($url)}}">Details</a>--}}
{{--                                 @endif--}}
{{--								</td>--}}
{{--								@endforeach--}}
{{--							</tr>--}}

{{--						</tbody>--}}
{{----------------------------------------------------------- end old way ----------------------}}

{{----------------------------------------------------------- start new way ----------------------}}

                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Message</th>
                            <th>seen</th>
                        </tr>
                    </thead>
                    <tbody>
{{--                    @foreach($obj as  $key=> $value)--}}
{{--                            @php--}}
{{--                            $new_obj = json_decode($value, true);--}}
{{--                            @endphp--}}
{{--                        <tr>--}}

{{--                            <td>{{ $new_obj['name']  }}</td>--}}
{{--                            <td>{{ $new_obj['email']   }}</td>--}}
{{--                            <td>{{$new_obj['Details']??''}}--}}
{{--                                  --}}
{{--                               @php--}}
{{--                               $id = $new_obj['id']??'';--}}
{{--                               $url = $new_obj['url']??'';--}}
{{--                              @endphp--}}
{{--                              @if(is_int($id))--}}
{{--                              <a class="btn btn-danger" href="{{route($url,$id)}}">Details</a>--}}
{{--                              @else--}}
{{--                              <a class="btn btn-danger" href="{{route($url)}}">Details</a>--}}
{{--                               @endif--}}
{{--                            </td>--}}
{{--                            @endforeach--}}
{{--                        </tr>--}}

                    @foreach($notificationsData as $notification)
                        <tr>
                            <td>{{$notification->category}}</td>
                            <td>
                                <a href="{{$notification->link}}" >
                                    {{$notification->message}}
                                </a>
                            </td>
                            <td>
                                @if($notification->seen)
                                    <span class="badge badge-success"></span>
                                @else
                                    <span class="badge badge-danger"></span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
{{----------------------------------------------------------- end new way ----------------------}}

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
