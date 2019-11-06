@extends('layouts.ecom')

@section('content')

        @forelse($shirts->chunk(4) as $chunk)
            @foreach($chunk as $shirt)
                        <!-- Product 10 -->
                                @if($shirt->category_id == 1)
                                    <div class="product-item accessories">
                                @elseif($shirt->category_id == 2)
                                    <div class="product-item men">
                                @elseif($shirt->category_id == 3)
                                    <div class="product-item women">
                                @endif
                        <a href="{{url('product', $shirt->id)}}">
                            <div class="product product_filter">
                                <div class="product_image">
                                     <img src="{{url('images',$shirt->image)}}" alt="" />
                                </div>
                                <div class="favorite"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="{{url('product', $shirt->id)}}">{{$shirt->name}}</a></h6>
                                    <h6 class="product_name"><a href="{{url('product', $shirt->id)}}">{{$shirt->description}}</a></h6>
                                    <div class="product_price">₱{{$shirt->price}}</div>
                                </div>
                            </div>
                        </a>

                            @if($shirt->stocks <= 0)
                                    <div class="red_button add_to_cart_button"><a href="#">
                                        Out of Stock
                                     </a></div>
                            @else
                                    @if($shirt->category_id == 1)
                                     <div class="red_button add_to_cart_button"><a href="{{route('cart.addItem',$shirt->id)}}">
                                        Add to Cart
                                     </a></div>
                                    @else
                                      @if (Auth::guest())
                                        <!-- Button trigger modal -->
                                        <div class="red_button add_to_cart_button">
                                        <a href="{{url('login')}}">
                                          add to schedule
                                        </a>
                                        </div>
                                        @else
                                        <div class="red_button add_to_cart_button">
                                        <a href="{{url('product', $shirt->id)}}">
                                          add to schedule
                                        </a>
                                        </div>
                                        @endif
                            


                                    @endif
                            @endif
                        </div>

            

            @endforeach
        @empty
            <h3>No Display</h3>
        @endforelse

@endsection


