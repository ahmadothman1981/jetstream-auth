<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
    public function MyCart()
    {
        return view('frontend.wishlist.view_mycart');
    }//End Method

    public function GetCartProduct()
    {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();


        return response()->json(array(
            'carts'=> $carts,
            'cartQty' => $cartQty,
            'cartTotal'=> round($cartTotal),


        ));
    }//End Method

    public function RemoveCartProduct($rowId)
    {
         Cart::remove($rowId);

          return response()->json(['success'=>'Product Removed From Your Cart']);
    }//End Method

    public function CartIncrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId,$row->qty + 1 );

         return response()->json(['Increment']);
    }//End Method

     public function CartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId,$row->qty - 1 );

         return response()->json(['Decrement']);
    }//End Method
}
