@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
             @include('frontend.common.user_sidebar')
             <div class="col-md-2">
                
            </div><!--end col-md-2-->
             <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">{{ __('translation.Hi') }}...</span><strong>{{ Auth::user()->name }}</strong> {{ __('translation.Update Your Profile') }}</h3>

                    <div class="card-body">
                        <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data" >
                            @csrf

                             <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">{{ __('translation.Name') }} <span></span></label>
             <input type="text" class="form-control "  name="name" value="{{ $user->name }}" >
                            </div>
                 <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">{{ __('translation.Email Address') }} <span></span></label>
            <input type="email" class="form-control " id="email" name="email" value="{{ $user->email }}" >
        </div>

         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">{{ __('translation.Phone') }} <span></span></label>
            <input type="text" class="form-control " id="phone" name="phone" value="{{ $user->phone }}" >
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">{{ __('translation.User Image') }} <span></span></label>
            <input type="file" class="form-control " id="phone" name="profile_photo_path"  >
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-danger">{{ __('translation.Update') }}</button>
        </div>
         
                            
                        </form>
                    </div>
                </div>
            </div><!--end col-md-6-->
        </div><!--end row-->
    </div>
    
</div>




@endsection 