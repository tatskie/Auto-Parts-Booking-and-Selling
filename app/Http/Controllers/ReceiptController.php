<?php

namespace App\Http\Controllers;

use App\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function book()
    {
        return view('book');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts = auth()->user()->receipts()->orderBy('updated_at', 'desc')->paginate(20);
        return view('receipts.index', compact('receipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Set your secret key: remember to change this to your live secret key in production
    // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_t13lUuz2XS4jJs0mrm36oTuC");

// Get the credit card details submitted by the form
        $token = $request->stripeToken;

// Create a charge: this will charge the user's card
        try {
            $charge = \Stripe\Charge::create(array(

                "amount" =>  str_replace( [',','.'], ['.'], $request->input('amount') *100 ), // Amount in cents
                "currency" => "php",
                "source" => $token,
                "description" => "Example charge"
            ));
        } catch (\Stripe\Error\Card $e) {
            // The card has been declined
        }

        $chars = array_merge(range(0, 9));
        shuffle($chars);
        $no = implode(array_slice($chars, 0,25));
            
            $receipt = Receipt::create([
                'receipt_no' => $no,$request->input('reservation_id'),
                'user_id' => auth()->user()->id,
                'reservation_id' => $request->input('reservation_id')
            ]);
        return redirect()->route('receipts.show', $receipt->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receipt = Receipt::findOrFail($id);
        return view('book', compact('receipt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receipt = Receipt::findOrFail($id);
        $receipt->update(['cancel' => 1]);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        //
    }
}
