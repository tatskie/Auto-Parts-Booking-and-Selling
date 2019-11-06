@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <div class="section_title new_arrivals_title">
                <h2>Shipping Info</h2>
            </div>
        </div>
    </div>
    <div class="row align-items-center" style="margin-top: 70px;">
        <div class="col text-center">
            <div class="row">
                <div class="col-md-12">

                {!! Form::open(['route' => 'address.store', 'method' => 'post']) !!}

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('addressline', 'Address Line') }}

                            @if(Auth::guest())

                            {{ Form::text('addressline', null, array('class' => 'form-control')) }}

                            @else
                                @if(!empty(auth()->user()->address))
                                <input type="text" name="addressline" class="form-control" value="{{Auth::user()->address->addressline}}">
                                @else
                                <input type="text" name="addressline" class="form-control">
                                @endif
                            @endif  
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('street', 'Street') }}

                            @if(Auth::guest())

                            {{ Form::text('street', null, array('class' => 'form-control')) }}

                            @else
                                @if(!empty(auth()->user()->address))
                                <input type="text" name="street" class="form-control" value="{{Auth::user()->address->street}}">
                                @else
                                <input type="text" name="street" class="form-control">
                                @endif
                            @endif  
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('city', 'City') }}
                            @if(Auth::guest())

                            {{ Form::text('city', null, array('class' => 'form-control')) }}

                            @else
                                @if(!empty(auth()->user()->address))
                                <input type="text" name="city" class="form-control" value="{{Auth::user()->address->city}}">
                                @else
                                <input type="text" name="city" class="form-control">
                                @endif
                            @endif 
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('zip', 'Zip') }}
                            
                            @if(Auth::guest())

                            {{ Form::text('zip', null, array('class' => 'form-control')) }}

                            @else
                                @if(!empty(auth()->user()->address))
                                <input type="text" name="zip" class="form-control" value="{{Auth::user()->address->zip}}">
                                @else
                                <input type="text" name="zip" class="form-control">
                                @endif
                            @endif 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('province', 'Province') }}
                            @if(Auth::guest())

                            {{ Form::text('province', null, array('class' => 'form-control')) }}

                            @else
                                @if(!empty(auth()->user()->address))
                                <input type="text" name="province" class="form-control" value="{{Auth::user()->address->province}}">
                                @else
                                <input type="text" name="province" class="form-control">
                                @endif
                            @endif 
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('phone', 'Phone') }}
                            @if(Auth::guest())

                            {{ Form::text('phone', null, array('class' => 'form-control')) }}

                            @else
                                @if(!empty(auth()->user()->address))
                                <input type="text" name="phone" class="form-control" value="{{Auth::user()->address->phone}}">
                                @else
                                <input type="text" name="phone" class="form-control">
                                @endif
                            @endif 
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        {{ Form::submit('Proceed to Payment', array('class' => 'btn btn-block btn-success')) }}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
             </div>
        </div>
    </div>
</div>


@endsection