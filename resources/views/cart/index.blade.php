@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <div class="section_title new_arrivals_title">
                <h2>My Shopping Cart</h2>
            </div>
        </div>
    </div>
    
@if (session()->has('status'))
    <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            {!! session()->get('status') !!}
        </strong>
    </div>
@endif
    <div class="row align-items-center" style="margin-top: 70px;">
        <div class="col text-center">
            <div class="row">
                <div class="col-md-8">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stocks</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cartItems as $cartItem)
                        <tr>
                            <td>{{$cartItem->name}}</td>
                            <td>₱{{$cartItem->price}}</td>
                            <td>{{$cartItem->options->stock}}</td>
                            <td width="50px">
                                {!! Form::open(['route' => ['cart.update',$cartItem->rowId], 'method' => 'PUT']) !!}

                                <input name="qty" size="5" type="text" value="{{$cartItem->qty}}">

                                <input type="hidden" name="stock" value="{{$cartItem->options->stock}}">
                                <input type="hidden" name="product_id" value="{{$cartItem->options->product_id}}">
                            </td>
                            <td>
                                <div > {!! Form::select('size', ['small'=>'Small','medium'=>'Medium','large'=>'Large'] , $cartItem->options->has('size')?$cartItem->options->size:'' ) !!}
                                   </div>

                            </td>

                            <td>
                                <input style="float: left"  type="submit" class="btn btn-info btn-sm" value="Ok">
                                {!! Form::close() !!}

                                <form action="{{route('cart.destroy',$cartItem->rowId)}}"  method="POST">
                                   {{csrf_field()}}
                                   {{method_field('DELETE')}}
                                   <input class="btn btn-danger btn-sm" type="submit" value="Cancel">
                                 </form>
                            </td>
                        </tr>

                    @empty
                        <h4>No Cart!</h4>
                    @endforelse
                    
                    </tbody>
                </table>
                </div>
                <div class="col-md-4">
                <div class="newsletter" style="margin-top: -10px">
                <table class="table table-hover">
                     <thead>
                    <tr>
                        <th> 
                            Order Summary
                        </th>
                        
                        
                        
                        <th> </th>
                        <th>Amount </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tax: </td>
                            
                            
                            <td> </td>
                            <td>₱{{Cart::tax()}}</td>
                        </tr>
                        <tr>
                            <td>Sub Total: </td>
                            
                            
                            <td> </td>
                            <td>₱{{Cart::subtotal()}}</td>
                        </tr>
                        <tr>
                            <td>Grand Total: </td>
                            
                            
                            <td> </td>
                            <td>₱{{Cart::total()}}</td>
                        </tr>

                        <tr>
                        <td>Items: {{Cart::count()}}</td>
                        <td>
                            
                        </td>

                        
                        <td>
                            @if(count($cartItems) == 0)
                                <a href="{{url('')}}" class="btn btn-warning">Select Product</a>
                            @else
                                <a href="{{route('checkout.shipping')}}" class="btn btn-warning">Proceed Checkout</a>
                            @endif
                        </td>
                        

                    </tr>
                    </tbody>
                </table>
            </div>
                </div>
            </div>

        </div>
    </div>
            
</div>
    



@endsection