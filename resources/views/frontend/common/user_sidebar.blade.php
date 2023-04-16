@php
 $id = Auth::user()->id;
$user = App\Models\User::find($id);
@endphp
<div class="col-md-2"><br>
                <img class="card-img-top" style="border-radius: 50%;" src="{{ (!empty($user->profile_photo_path))?url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" height="100%" width="100%"><br><br>
                <ul class="list-group list-group-flush">
   <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">{{ __('translation.Home') }}</a>
    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">{{ __('translation.Profile Update') }}</a>
    <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">{{ __('translation.Change Password') }}</a>
    <a href="{{ route('my.orders') }}" class="btn btn-primary btn-sm btn-block">{{ __('translation.My Orders') }}</a>
    <a href="{{ route('return.orders.list') }}" class="btn btn-primary btn-sm btn-block">{{ __('translation.Return Orders') }}</a>
    <a href="{{ route('cancel.order') }}" class="btn btn-primary btn-sm btn-block">{{ __('translation.Cancel Orders') }}</a>
    <a href="{{ route('apply-ticket') }}" class="btn btn-danger btn-sm btn-block"> Ticket To Admin</a>
    <a href="{{ route('admin-replay') }}" class="btn btn-danger btn-sm btn-block"> Admin Replay</a>
    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">{{ __('translation.LogOut') }}</a>

                </ul>
            </div><!--end col-md-2-->