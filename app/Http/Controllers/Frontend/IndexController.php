<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class IndexController extends Controller
{
    public function Index()
    {
        return view('frontend.index');
    }//end method

    public function UserLogout()
    {
        Auth::logout();
        return redirect()->route('login'); 
    }//end method

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.user_profile',compact('user'));
    }//end method

    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
         $data->phone = $request->phone;

        if($request->file('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message'=> 'User Profile Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('user.profile')->with( $notification);
    }//end method


}
