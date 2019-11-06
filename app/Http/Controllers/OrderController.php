<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->orderBy('updated_at', 'desc')->paginate(20);
        return view('orders.index', compact('orders'));
    }
    public function Orders($type='')
    {   
        if ($type== 'cancel') {
            $orders=Order::where('cancel','1')->orderBy('updated_at', 'desc')->paginate(10);
        }
        else{
            if($type =='pending'){
                $orders=Order::where('cancel','0')->where('delivered','0')->orderBy('updated_at', 'desc')->paginate(10);
            }elseif ($type == 'delivered'){
                $orders=Order::where('cancel','0')->where('delivered','1')->orderBy('updated_at', 'desc')->paginate(10);
            }else{
                $orders=Order::orderBy('updated_at', 'desc')->paginate(10);
            }
        }
            
        // $address = auth()->user()->address()->orderBy('updated_at', 'desc')->first();

        return view('admin.orders',compact('orders'));
    }

    public function cancelOrder($id)
    {
        $order = Order::findOrFail($id);
        
        $order->update(['cancel' => 1]);

        return redirect()->back();
    }

    public function toggledeliver(Request $request,$orderId)
    {
        $order=Order::find($orderId);

        if($request->has('delivered')){
            $time=Carbon::now()->addMinute(1);

          //  Mail::to($order->user)->later($time,new OrderShipped($order));

            $order->delivered=$request->delivered;

            
        }else{
            $order->delivered="0";
        }
        $order->save();

        return back();
    }
}
