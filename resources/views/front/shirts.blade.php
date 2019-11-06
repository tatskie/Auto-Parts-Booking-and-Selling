@extends('layouts.template')

@section('title','Shirts')
@section('content')
    <!-- products listing -->
    <!-- Latest SHirts -->
    <div class="container">
    <div class="row">
        <div class="col text-center">
            <div class="section_title new_arrivals_title">
                <h2>Accessories</h2>
            </div>
        </div>
    </div>
    <div class="row align-items-center" style="margin-top: 70px;">
        <div class="col text-center">
            <div class="row">
                <div class="col-md-12">
<div class="row">
                <div class="col">
                    <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
        @forelse($shirts->where('category_id', 1) as $shirt)
            <!-- Product 10 -->
                                @if($shirt->category_id == 1)
                                    <div class="product-item accessories">
                                @elseif($shirt->category_id == 2)
                                    <div class="product-item men">
                                @elseif($shirt->category_id == 3)
                                    <div class="product-item women">
                                @endif
                        
                            <div class="product product_filter">
                                <div class="product_image">
                                     <img src="{{url('images',$shirt->image)}}" alt="" />
                                </div>
                                <div class="favorite"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="{{url('product', $shirt->id)}}">{{$shirt->name}}</a></h6>
                                    <h6 class="product_name"><a href="#">{{$shirt->description}}</a></h6>
                                    <div class="product_price">₱{{$shirt->price}}</div>
                                </div>
                            </div>
                            @if($shirt->stocks <= 0)
                                    <div class="red_button add_to_cart_button"><a href="#">
                                        Out of Stock
                                     </a></div>
                            @else
                                @if($shirt->category_id == 1)
                                 <div class="red_button add_to_cart_button"><a href="{{route('cart.addItem',$shirt->id)}}">
                                    Add to Cart
                                 </a></div>
                                @elseif($shirt->category_id == 2)
                                    <div class="red_button add_to_cart_button"><a href="{{route('cart.addItem',$shirt->id)}}">
                                        Bulk
                                     </a></div>
                                @elseif($shirt->category_id == 3)
                                    <div class="red_button add_to_cart_button"><a href="{{route('cart.addItem',$shirt->id)}}">
                                        Bulk
                                     </a></div>
                                @endif
                            @endif
                        </div>


        @empty
        <h3>No shirts</h3>
       @endforelse
    </div>
                </div>
            </div>
            </div>
                </div>
            </div>
        </div>
@endsection