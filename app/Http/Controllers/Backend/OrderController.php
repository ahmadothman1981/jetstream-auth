<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class OrderController extends Controller
{
   public function PendingOrders()
   {
    $orders = Order::where('status','Pending')->orderBy('id','DESC')->get();

    return view('backend.orders.pending_orders',compact('orders'));
   }//End Method 

   public function PendingOrdersDetails($order_id)
   {
     $order = Order::with('division','district','state','user')->where('id',$order_id)->first();

     $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

     return view('backend.orders.pending_orders_details',compact('order','orderItem'));
   }//End Method

   public function ConfirmedOrders()
   {
     $orders = Order::where('status','confirmed')->orderBy('id','DESC')->get();

    return view('backend.orders.confirmed_orders',compact('orders'));
   }//End Method

   public function ProcessingOrders()
   {
    $orders = Order::where('status','processing')->orderBy('id','DESC')->get();

    return view('backend.orders.processing_orders',compact('orders'));
   }//End Method

   public function PickedOrders()
   {
    $orders = Order::where('status','picked')->orderBy('id','DESC')->get();

    return view('backend.orders.picked_orders',compact('orders'));
   }//End Method

   public function ShippedOrders()
   {
    $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();

    return view('backend.orders.shipped_orders',compact('orders'));
   }//End Method

    public function DiliveredOrders()
   {
    $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();

    return view('backend.orders.dilivered_orders',compact('orders'));
   }//End Method

   public function CancelOrders()
   {
    $orders = Order::where('status','canceled')->orderBy('id','DESC')->get();

    return view('backend.orders.cancel_orders',compact('orders'));
   }//End Method


   public function PendingToConfirm($order_id)
   {
    Order::findOrFail($order_id)->update([
        'status' => 'confirmed',

    ]);

      $notification = array(
            'message' => 'Order Confirmed Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('pending-orders')->with($notification);


   }//End Method

   public function ConfirmToProcessing($order_id)
   {
    Order::findOrFail($order_id)->update([
        'status' => 'processing',

    ]);

      $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('confirmed-orders')->with($notification);
   }//End Method

    public function ProcessingToPicked($order_id)
   {
    Order::findOrFail($order_id)->update([
        'status' => 'picked',

    ]);

      $notification = array(
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('processing-orders')->with($notification);
   }//End Method

    public function PickedToShipped($order_id)
   {
    Order::findOrFail($order_id)->update([
        'status' => 'shipped',

    ]);

      $notification = array(
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('picked-orders')->with($notification);
   }//End Method

    public function ShippedToDelivered($order_id)
   {
    Order::findOrFail($order_id)->update([
        'status' => 'delivered',

    ]);

      $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('shipped-orders')->with($notification);
   }//End Method

    public function DeliveredToCancel($order_id)
   {
    Order::findOrFail($order_id)->update([
        'status' => 'canceled',

    ]);

      $notification = array(
            'message' => 'Order Canceled Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dilivered-orders')->with($notification);
   }//End Method

   public function AdminInvoiceDownload($order_id)
   {
     $order = Order::with('division','district','state','user')->where('id',$order_id)->first();

     $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

      $pdf = Pdf::loadView('backend.orders.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOptions([
        'tempDir'=>public_path(),
        'chroot'=>public_path(),
      ]);
      return $pdf->download('invoice.pdf');


   }//End Method
}
