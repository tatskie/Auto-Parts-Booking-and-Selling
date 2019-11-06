@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <div class="section_title new_arrivals_title">
                <h2>Payment</h2>
            </div>
        </div>
    </div>
    <div class="row align-items-center" style="margin-top: 70px;">
        <div class="col text-center">
            <div class="row">
                <div class="col-md-6">

        

            <div class="row">
               

                    <div class="product product_filter">
                                <div class="product_image">
                                     <img src="{{url('images',$reservation->product->image)}}" alt="" />
                                </div>
                                <div class="favorite"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="{{url('product', $reservation->id)}}">{{$reservation->product->name}}</a></h6>
                                    <h6 class="product_name"><a href="#">{{$reservation->product->description}}</a></h6>
                                    <div class="product_price">₱{{$reservation->product->price}}</div>
                                </div>
                            </div>

                    
                </div>
                
             </div>

                <div class="col-md-6">
                    <div class="newsletter" style="margin-top: -10px">
        <form action="{{route('receipts.store')}}" method="POST" id="payment-form" style="padding: 15px 15px 15px 15px;">
            {{csrf_field()}}

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <span class="payment-errors" style="color: orange;"></span>
                    </div>
                </div>
                <input type="hidden" name="amount" value="{{$reservation->product->price}}">
                <input type="hidden" name="reservation_id" value="{{$reservation->id}}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>
                                <span>Card Number</span>
                            </label>
                                <input type="text" size="20" data-stripe="number" class="form-control">
                            
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>
                                <span>CVC</span>
                             </label>
                                <input type="text" size="4" data-stripe="cvc" class="form-control">
                           
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>
                                <span>Expiration (MM/YY)</span>
                            </label>

                            <div class="row">
                                <div class="col-md-5">
                                <input type="text" size="2" data-stripe="exp_month" class="form-control">
                                </div>
                                 <div class="col-md-2">
                                <span> / </span>
                                </div>
                                <div class="col-md-5">
                                <input type="text" size="2" data-stripe="exp_year" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-block btn-success" value="Submit Payment">
                        </div>
                    </div> 
                </div>
                </form>
            </div>
             </div>
        </div>
    </div>
</div>
@endsection