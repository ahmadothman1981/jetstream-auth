<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class AllUserController extends Controller
{
   public function MyOrders()
   {
        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();

        return view('frontend.user.order.order_view',compact('orders'));
   }//End Method

   public function OrderDetails($order_id)
   {
     $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();

     $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

     return view('frontend.user.order.order_details',compact('order','orderItem'));


   }//End Method

   public function InvoiceDownload($order_id)
   {

     $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();

     $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

      $pdf = Pdf::loadView('frontend.user.order.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOptions([
        'tempDir'=>public_path(),
        'chroot'=>public_path(),
      ]);
      return $pdf->download('invoice.pdf');


     

     //return view('frontend.user.order.order_invoice',compact('order','orderItem'));

   }//End Method

   public function ReturnOrder(Request $request,$order_id)
   {
    Order::findOrFail($order_id)->update([

        'return_date'=>Carbon::now()->format('d F Y'),
        'return_reason'=>$request->return_reason,

    ]);

      $notification = array(
            'message' => 'Return Request sent Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);
   }//End Method

   public function ReturnOrderList()
   {
     $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();

        return view('frontend.user.order.return_order_view',compact('orders'));
   }//End Method

   public function CancelOrders()
   {
    $orders = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();

        return view('frontend.user.order.cancel_order_view',compact('orders'));
   }//End Method
}
