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

class CashController extends Controller
{
     public function CashOrder(Request $request)
    {
        if(Session::has('coupon'))
        {
            $coupon_id = Session::get('coupon')['coupon_id'];
            $coupon_check = Coupon::where('id',$coupon_id)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }

       


    $order_id = Order::insertGetId([
         'user_id'=> Auth::id(),
         'division_id'=> $request->division_id,
         'district_id'=> $request->district_id,
         'state_id'=> $request->state_id,
         'name'=> $request->name,
         'email'=>$request->email,
         'phone'=>$request->phone,
         'notes'=>$request->notes,
         'post_code'=>$request->post_code,
         'payment_type'=>'Cash On Delivery',
         'payment_method'=>'Cash On Delivery',
         'currency'=>'USD',
         'amount'=>$total_amount,
         'invoice_number'=>'MSS'.mt_rand(10000000, 99999999),
         'order_date'=>Carbon::now()->format('d F Y'),
         'order_month'=>Carbon::now()->format('F'),
         'order_year'=>Carbon::now()->format('Y'),
         'status'=>'Pending',
         'created_at'=>Carbon::now(),
         'coupon'=>$coupon_id,
         'amount_no_discount'=>round(Cart::total()),


    ]);


    $carts = Cart::content();

    foreach($carts as $cart)
    {
        OrderItem::insert([
            'order_id'=>$order_id,
            'product_id'=>$cart->id,
            'color'=>$cart->options->color,
            'size'=>$cart->options->size,
            'qty'=>$cart->qty,
            'price'=>$cart->price,



        ]);
    }

    $discount_name =  Session::get('coupon')['coupon_name'];
           $count =  Coupon::where('coupon_name',$discount_name)->count();
           Coupon::where('coupon_name',$discount_name)->update([
            'counting' => $count+1,
           ]);
           
    if(Session::has('coupon'))
    {
        
        Session::forget('coupon');
    }

    Cart::destroy();

     $notification = array(
            'message' => 'Order Placed  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);

    }//END Method
}
