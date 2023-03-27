<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
     public function AllRoles()
    {

        $roles = Role::latest()->get();

        return view('admin.roles.all_rolles_view',compact('roles'));
    }//End Method

    public function AddRoles(Request $request)
    {
      $request->validate([
        'name'=> 'required',
      ],[
        'name.required'=> 'Input Role Name']); 

        Role::create(['name' => $request->name]);

        $notification = array(
            'message'=> 'Role Inserted Successfully',
            'alert-type' => 'success',
        );

         return redirect()->back()->with( $notification);
    }//End Method

    public function RoleEdit($id)
      {
        $role = Role::findOrFail($id);
         return view('admin.roles.role_edit',compact('role'));
      }//End Method

      public function UpdateRoles(Request $request)
      {
        $role_id = $request->id;

        Role::findOrFail($role_id)->update([
            'name'=>$request->name,
        ]);

        $notification = array(
                'message'=> 'Role Updated Successfully',
                'alert-type' => 'info',
            );

             return redirect()->route('roles')->with( $notification);
      }//End Method

       public function RoleDelete($id)
    {
          Role::findOrFail($id)->delete();
          $notification = array(
                'message'=> 'Role Deleted Successfully',
                'alert-type' => 'info',
            );

             return redirect()->back()->with( $notification);
    }
}
