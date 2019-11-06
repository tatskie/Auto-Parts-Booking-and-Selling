<?php

namespace App;

use App\User;
use App\Address;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;

class Order extends Model
{
    protected $fillable=['total','delivered', 'cancel', 'address_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function orderItems()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty','total');
    }

    public static function createOrder($id){
        $user=Auth::user();
        $order=$user->orders()->create([
            'total'=>Cart::total(),
            'delivered'=>0,
            'address_id'=>$id
        ]);

        $cartItems=Cart::content();
        foreach ($cartItems as $cartItem){
            $order->orderItems()->attach($cartItem->id,[
                'qty'=>$cartItem->qty,
                'total'=>$cartItem->qty*$cartItem->price
            ]);

            $product = Product::findOrFail($cartItem->options->product_id);

            $total = $product->stocks - $cartItem->options->stock;
            $product->update(['stocks' => $total]);
            Cart::destroy($cartItem->id);
        }
  }

}
