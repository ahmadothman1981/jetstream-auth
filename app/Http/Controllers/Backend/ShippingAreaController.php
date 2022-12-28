<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
   public function DivisionView()
   {
    $divisions = ShipDivision::orderBy('id','DESC')->get();

    return view('backend.ship.division.view_division',compact('divisions'));
   }//End Method 

   public function DivisionStore(Request $request)
   {
    $request->validate([
            'division_name' => 'required',
        
        ]);

         

    ShipDivision::insert([
        'division_name' => strtoupper($request->division_name),
        
        'created_at'=>Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Division Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


   }//End Method 

   public function DivisionEdit($id)
   {
    $divisions = ShipDivision::findOrFail($id);

    return view('backend.ship.division.edit_division',compact('divisions'));
   }//End Method 


   public function DivisionUpdate(Request $request, $id)
   {
    ShipDivision::findOrFail($id)->update([
        'division_name' => strtoupper($request->division_name),
        
        'created_at'=>Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-division')->with($notification);
   }//End Method 

   public function DivisionDelete($id)
   {
     ShipDivision::findOrFail($id)->delete();
      
        $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-division')->with($notification);
   }//End Method

////////// Start  Ship District///////////////
   

   public function DistrictView()
   {
    $divisions = ShipDivision::orderBy('division_name','ASC')->get();
    $district = ShipDistrict::with('division')->orderBy('id','DESC')->get();

    return view('backend.ship.district.view_district',compact('district','divisions'));
   }//End Method


   public function DistrictStore(Request $request)
   {
    $request->validate([
            'district_name' => 'required',
            'division_id' => 'required',
        
        ]);

         

    ShipDistrict::insert([
        'division_id' => $request->division_id,
        'district_name' => strtoupper($request->district_name),
        'created_at'=>Carbon::now(),

        ]);

        $notification = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


   }//End Method 

   public function DistrictEdit($id)
   {

    $divisions = ShipDivision::orderBy('division_name','ASC')->get();
    $district = ShipDistrict::findOrFail($id);

    return view('backend.ship.district.edit_district',compact('district','divisions'));
   }//End Method 


    public function DistrictUpdate(Request $request, $id)
   {
    ShipDistrict::findOrFail($id)->update([
        'division_id'=>$request->division_id,
        'district_name' => strtoupper($request->district_name),
        'created_at'=>Carbon::now(),

        ]);

        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-district')->with($notification);
   }//End Method 

    public function DistrictDelete($id)
   {
     ShipDistrict::findOrFail($id)->delete();
      
        $notification = array(
            'message' => 'District Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-district')->with($notification);
   }//End Method

   ///////end shipping district methods

   /////start shipping state methods


   public function StateView()
   {
    $divisions = ShipDivision::orderBy('division_name','ASC')->get();
    $district = ShipDistrict::orderBy('district_name','ASC')->get();
    $state = ShipState::with('division','district')->orderBy('id','DESC')->get();

    return view('backend.ship.state.view_state',compact('district','divisions','state'));
   }//End Method

   public function StateStore(Request $request)
   {
    $request->validate([
            'district_id' => 'required',
            'division_id' => 'required',
            'state_name' => 'required',
        
        ]);

         

    ShipState::insert([
        'division_id' => $request->division_id,
        'district_id' => $request->district_id,
        'state_name' => $request->state_name,
        'created_at'=>Carbon::now(),

        ]);

        $notification = array(
            'message' => 'State Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


   }//End Method 

   public function StateEdit($id)
   {
    $divisions = ShipDivision::orderBy('division_name','ASC')->get();
    $district = ShipDistrict::orderBy('district_name','ASC')->get();
    $state = ShipState::findOrFail($id);

    return view('backend.ship.state.edit_state',compact('district','divisions','state'));
   }//End Method
}
