<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class stripeController extends Controller
{
    public function StripeOrder(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51MNt98AZSzg6tHElmfAdbZx5TvmeL0oeOzQ8aJkoftL4vMOkjEndoyiAeTibendBlF2VeasIXhTdKpkMhg2wN7Tk00Oz0YpSkT');


    $token = $_POST['stripeToken'];
    $charge = \Stripe\Charge::create([
      'amount' => 999*100,
      'currency' => 'usd',
      'description' => 'Mansoura Store',
      'source' => $token,
      'metadata' => ['order_id' => '6735'],
    ]);

    dd($charge);
    }//END Method
}
