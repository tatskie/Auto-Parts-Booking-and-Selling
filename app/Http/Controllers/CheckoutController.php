<?php

namespace App\Http\Controllers;

use App\Order;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
//    public function step1()
//    {
//        if (Auth::check()) {
//            return redirect()->route('checkout.shipping');
//        }
//
//        return redirect('login');
//    }

    public function shipping()
    {
        return view('front.shipping-info');
    }

    public function payment($id)
    {
        $address = Address::findOrFail($id);
        return view('front.payment', compact('address'));
    }

    public function order($id)
    {
        $order = Order::findOrFail($id);
        return view('order', compact('order'));
    }


    public function storePayment(Request $request)
    {
        // Set your secret key: remember to change this to your live secret key in production
    // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_t13lUuz2XS4jJs0mrm36oTuC");

// Get the credit card details submitted by the form
        $token = $request->stripeToken;

// Create a charge: this will charge the user's card
        try {
            $charge = \Stripe\Charge::create(array(

                "amount" => str_replace( [',','.'], ['.'], Cart::total() )*1.0, // Amount in cents
                "currency" => "php",
                "source" => $token,
                "description" => "Example charge"
            ));
        } catch (\Stripe\Error\Card $e) {
            // The card has been declined
        }
        $id = $request->input('address');
      //Create the order
        Order::createOrder($id);

        $user=Auth::user();
        $order = $user->orders()->orderBy('id', 'desc')->first();
        $total = $order->stocks - 1;
        $order->update(['stocks' => $total]);
        //redirect user to some page
       return redirect()->route('order', $order->id);

    }


}
