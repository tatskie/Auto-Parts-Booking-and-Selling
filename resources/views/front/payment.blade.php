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
                <div class="col-md-12">

        <form action="{{route('payment.store')}}" method="POST" id="payment-form">
            {{csrf_field()}}
            <input type="hidden" name="address" value="{{$address->id}}" class="form-control">
            <div class="row">
                <span class="payment-errors"></span>

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
@endsection