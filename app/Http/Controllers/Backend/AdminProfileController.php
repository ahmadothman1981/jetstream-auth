<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Image;
use Carbon\Carbon;



class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $id = Auth::user()->id;

        $adminData = Admin::find($id);
        return view('admin.admin_profile_view',compact('adminData'));

    }//End Method 

    public function AdminProfileEdite()
    {
        $id = Auth::user()->id;
         $editeData = Admin::find($id);

         return view('admin.admin_profile_edite',compact('editeData'));
    }//End Method 

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message'=> 'Admin Profile Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.profile')->with( $notification);

    }//End Method

    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }//End Method

    public function AdminUpdateChangePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword'=> 'required',
            'password' =>'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword))
        {
            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');

        }else{
            return redirect()->back();
        }
    }//End Method


    public function AllUsers()
    {
        $users = User::latest()->get();

        return view('backend.user.all_user',compact('users'));
    }//End Method


     public function AllAdmins()
    {
        $admins = Admin::latest()->get();

        return view('admin.admin_all',compact('admins'));
    }//End Method

public function AddAdmin()
{
    $roles = Role::latest()->get();
    
   
    return view('admin.admin_create',compact('roles'));
}//End Method

public function AdminStore(Request $request, Role $role)
{
    $request->validate([
        'name'=> 'required',
        'email'=> 'required',
        'password'=> 'required',
      ],[
        'name.required'=> 'Name Required',
        'email.required'=> ' Email Required',
      ]); 
     

      $image = $request->file('profile_photo_path');
      $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
      $save_url = 'upload/admin_images/'.$name_gen;

      $admin_id = Admin::insertGetId([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'profile_photo_path'=>$save_url,
        'created_at'=>Carbon::now(),

      ]);
     $admin_data = Admin::find($admin_id);
     $role_name = $request->role_name;
     $admin_data->assignRole($role_name);

         $notification = array(
            'message'=> 'Admin Created Successfully',
            'alert-type' => 'success',
        );

         return view('admin.admin_all')->with( $notification);
}//End Method



}
