<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $adminData = Admin::find(1);

        return view('admin.admin_profile_view',compact('adminData'));

    }//End Method 

    public function AdminProfileEdite()
    {
         $editeData = Admin::find(1);
         return view('admin.admin_profile_edite',compact('editeData'));
    }//End Method 
}
