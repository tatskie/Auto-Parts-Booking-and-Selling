<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $shirts=Product::all();

        return view('front.home',compact('shirts'));
    }

    public function carwash()
    {
        $shirts=Product::all();

        return view('front.carwash',compact('shirts'));
    }
    public function detailing()
    {
        $shirts=Product::all();

        return view('front.detailing',compact('shirts'));
    }

    public function contact()
    {

        return view('front.contact');
    }

    public function shirts()
    {
        $shirts=Product::all();
        return view('front.shirts',compact('shirts'));
    }

    public function shirt($id)
    {
        $product = Product::findOrFail($id);
        return view('front.shirt',compact('product'));
    }
}
