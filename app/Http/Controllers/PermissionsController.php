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

          if(!Auth::guard('admin')->user()->can('Admin_create'))
    {
        abort(403);
    }
      $request->validate([
        'name'=> 'required',
        'group'=> 'required',
      ],[
        'name.required'=> 'Input permission Name',
        'group.required'=> 'Input Group Name'
    ]); 

        Permission::create(['name' => $request->name,
                            'group' => $request->group,
                            ]);

        $notification = array(
            'message'=> 'Permission Inserted Successfully',
            'alert-type' => 'success',
        );

         return redirect()->back()->with( $notification);
    }//End Method
    public function PermissionEdit($id)
      {

          if(!Auth::guard('admin')->user()->can('Admin_edit'))
    {
        abort(403);
    }
        $permission = Permission::findOrFail($id);
         return view('admin.permissions.permissions_edit',compact('permission'));
      }//End Method

       public function UpdatePermission(Request $request)
      {

          if(!Auth::guard('admin')->user()->can('Admin_edit'))
    {
        abort(403);
    }
        $permission_id = $request->id;

        Permission::findOrFail($permission_id)->update([
            'name'=>$request->name,
            'group'=>$request->group,
        ]);

        $notification = array(
                'message'=> 'Permission Updated Successfully',
                'alert-type' => 'info',
            );

             return redirect()->route('permissions')->with( $notification);
      }//End Method

       public function PermissionDelete($id)
    {
      
          if(!Auth::guard('admin')->user()->can('Admin_delete'))
    {
        abort(403);
    }
          Permission::findOrFail($id)->delete();
          $notification = array(
                'message'=> 'Permission Deleted Successfully',
                'alert-type' => 'info',
            );

             return redirect()->back()->with( $notification);
    }
}
