<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use App\Models\Admin;

class RoleController extends Controller
{


     public function AllRoles()
    {

        $roles = Role::latest()->get();

        return view('admin.roles.all_rolles_view',compact('roles'));
    }//End Method

    public function AddView()
    {

      $permissions = Permission::latest()->get();

      $permissions_group = Permission::latest()->get()->unique('group');

      return view('admin.roles.add_rolles',compact('permissions','permissions_group'));  
    }//End Method

    public function AddRoles(Request $request)
    {

          if(!Auth::guard('admin')->user()->can('Admin_create'))
    {
        abort(403);
    }

      $request->validate([
        'name'=> 'required',
      ],[
        'name.required'=> 'Input Role Name']); 

        $role = Role::create(['name' => $request->name]);
       
          $input = $request->all();
          $permis = $request->input('permission');
          
          $role->syncPermissions($permis);
          

       
        $notification = array(
            'message'=> 'Role Inserted Successfully',
            'alert-type' => 'success',
        );

         return redirect()->route('roles')->with( $notification);
    }//End Method

    public function RoleEdit($id)
      {

          if(!Auth::guard('admin')->user()->can('Admin_edit'))
    {
        abort(403);
    }
     
        $role = Role::findOrFail($id);
        $permissions = Permission::latest()->get();
      $permissions_group = Permission::latest()->get()->unique('group');
      $permissions_rolles = $role->getPermissionNames();

         return view('admin.roles.role_edit',compact('role','permissions','permissions_group','permissions_rolles'));
    
      }//End Method

      public function UpdateRoles(Request $request , Role $role)
      {

          if(!Auth::guard('admin')->user()->can('Admin_edit'))
    {
        abort(403);
    }
        $role_id = $request->id;
 

      Role::findOrFail($role_id)->update([
            'name'=>$request->name,
        ]);
        
          $input = $request->all();
          $permis = $request->input('permission');
         
          Role::findOrFail($role_id)->syncPermissions($permis);

        $notification = array(
                'message'=> 'Role Updated Successfully',
                'alert-type' => 'info',
            );

             return redirect()->route('roles')->with( $notification);
      }//End Method

       public function RoleDelete($id)
    {
      
          if(!Auth::guard('admin')->user()->can('Admin_delete'))
    {
        abort(403);
    }
          Role::findOrFail($id)->delete();
          $notification = array(
                'message'=> 'Role Deleted Successfully',
                'alert-type' => 'info',
            );

             return redirect()->back()->with( $notification);
    }//End Method
}
