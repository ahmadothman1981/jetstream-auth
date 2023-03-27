<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class PermissionsController extends Controller
{
     public function AllPermissions()
    {
        $permissions = Permission::latest()->get();

        return view('admin.permissions.all_permissions_view',compact('permissions'));
    }//End Method

     public function AddPermission(Request $request)
    {
      $request->validate([
        'name'=> 'required',
      ],[
        'name.required'=> 'Input Role Name']); 

        Permission::create(['name' => $request->name]);

        $notification = array(
            'message'=> 'Permission Inserted Successfully',
            'alert-type' => 'success',
        );

         return redirect()->back()->with( $notification);
    }//End Method
    public function PermissionEdit($id)
      {
        $permission = Permission::findOrFail($id);
         return view('admin.permissions.permissions_edit',compact('permission'));
      }//End Method

       public function UpdatePermission(Request $request)
      {
        $permission_id = $request->id;

        Permission::findOrFail($permission_id)->update([
            'name'=>$request->name,
        ]);

        $notification = array(
                'message'=> 'Permission Updated Successfully',
                'alert-type' => 'info',
            );

             return redirect()->route('permissions')->with( $notification);
      }//End Method

       public function PermissionDelete($id)
    {
          Permission::findOrFail($id)->delete();
          $notification = array(
                'message'=> 'Permission Deleted Successfully',
                'alert-type' => 'info',
            );

             return redirect()->back()->with( $notification);
    }
}
