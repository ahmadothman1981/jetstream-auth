<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;

class ReportController extends Controller
{
    public function ReportView()
    {
        return view('backend.report.report_view');
    }//End Method

    public function ReportByDate(Request $request)
    {
        $date = new DateTime($request->date);
        $formateDate = $date->format('d F Y'); 
         //return $formateDate;


        $orders = Order::where('order_date',$formateDate)->latest()->get();

        return view('backend.report.report_show',compact('orders'));
       

    }//End Method



    public function ReportByMonth(Request $request)
    {
        $orders = Order::where('order_month',$request->month)->where('order_year',$request->year_name)->latest()->get();

        return view('backend.report.report_show',compact('orders')); 
    }//End Method



     public function ReportByYear(Request $request)
    {
        $orders = Order::where('order_year',$request->year)->latest()->get();

        return view('backend.report.report_show',compact('orders')); 
    }//End Method

}
