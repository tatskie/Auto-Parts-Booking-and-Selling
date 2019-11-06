<?php

namespace App\Http\Controllers;

use App\Receipt;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type='')
    {
        if ($type== 'cancel') {
            $books=Receipt::where('cancel','1')->orderBy('updated_at', 'desc')->paginate(10);
        }
        else{
            if($type =='pending'){
                $books=Receipt::where('cancel','0')->where('status','0')->orderBy('updated_at', 'desc')->paginate(10);
            }elseif ($type == 'cancel'){
                $books=Receipt::where('cancel','0')->where('status','1')->orderBy('updated_at', 'desc')->paginate(10);
            }else{
                $books=Receipt::orderBy('updated_at', 'desc')->paginate(10);
            }
        }
            
        // $address = auth()->user()->address()->orderBy('updated_at', 'desc')->first();

        return view('admin.bookings',compact('books'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function markAsDone($id)
    {
        $receipt = Receipt::findOrFail($id);
        $receipt->update(['status' => 1]);
        return redirect()->back();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        //
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
