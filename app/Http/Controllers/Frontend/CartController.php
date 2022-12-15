<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use App\Models\Wishlist;
use Carbon\Carbon;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if($product->discount_price == NULL)
        {
            Cart::add([
                'id' => $id,
                 'name' => $request->product_name,
                  'qty' => $request->quantity,
                   'price' => $product->selling_price,
                    'weight' => 1,
                     'options' => [
                        'size' => $request->size,
                        'color' =>$request->color,
                        'image' => $product->product_thambnail,
                    ],
                 ]);

            return response()->json(['success'=> 'Successfully Added On Your Cart']);
        }else{
             Cart::add([
                'id' => $id,
                 'name' => $request->product_name,
                  'qty' => $request->quantity,
                   'price' => $product->discount_price,
                    'weight' => 1,
                     'options' => [
                        'size' => $request->size,
                        'color' =>$request->color,
                        'image' => $product->product_thambnail,
                    ],
                 ]);
              return response()->json(['success'=> 'Successfully Added On Your Cart']);
        }
    }//End Method


/////////MINI CART SECTION//////////
    public function AddMiniCart()
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



    public function removeMiniCart($rowId)
    {
        Cart::remove($rowId);

        return response()->json(['success'=>'Product Removed From Your Cart']);
    }//End Method

///////Add To WishList
    public function AddToWishlist(Request $request, $product_id)
    {
        if(Auth::check())
        {
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            Wishlist::insert([
                'user_id'=>Auth::id(),
                'product_id'=>$product_id,
                'created_at'=>Carbon::now(),

            ]);

            return response()->json(['success'=>' Added To WishList']);

        }else{
            
             return response()->json(['error'=>'LogIn To Add WishList']);
        }
    }//End Method
}
