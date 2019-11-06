@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <div class="section_title new_arrivals_title">
                <h2>Your Order</h2>
            </div>
        </div>
    </div>
    <div class="row align-items-center" style="margin-top: 70px;">
        <div class="col text-center">
            <div class="row">
            	<div class="col-md-4">
            		<div class="newsletter" style="margin-top: -10px">
            			<div class="container" style="padding: 20px 20px 20px 20px; text-align: left;">   		
		            		<div class="form-group">
		            			<h5>Order No: {{$order->id}}</h5>

		            			<h5>Total: ₱{{$order->total}} (with tax)</h5>
		            			<h5>Date Ordered: {{ \Carbon\Carbon::parse($order->created_at)->format('F j, Y')}}</h5>
		            		</div>
		            		<hr>
		            		<div class="form-group">
		            					@if($order->cancel == false)
		                            		@if($order->delivered == false)
		                                		<input type="submit" class="btn btn-warning" value="Cancel Order" data-toggle="modal" data-target="#myModal">
		                                		<!-- Small modal -->

												  <div class="modal fade" id="myModal" role="dialog">
												    <div class="modal-dialog modal-sm">
												      <div class="modal-content">
												        <div class="modal-header">
												        	<h6 class="modal-title">Cancel Order</h6>
												          <button type="button" class="close" data-dismiss="modal">&times;</button>
												          
												        </div>
												        <div class="modal-body">
												          <p>Are you sure you want to cancel order {{$order->id}}?</p>
												        </div>
												        <div class="modal-footer">
												        	<a href="{{route('cancel', $order->id)}}" class="btn btn-warning">Submit</a>
												          	<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
												        </div>
												      </div>
												    </div>
												  </div>


		                                	@else
		                                		<input type="submit" class="btn btn-info" value="Done!">
		                                	@endif
		                                @else
		                                <input type="submit" class="btn btn-danger" value="Order Canceled!">
		                                @endif	     
		            		</div>
	            		</div>
	            	</div>
            	</div>
                <div class="col-md-8">
	                <div class="newsletter" style="margin-top: -10px">
	               		  <table class="table table-hover">
		                    <thead>
		                    <tr>
		                        <th>Product Name</th>
		                        <th>Quantity</th>
		                        <th>Price</th>
		                        
		                    </tr>
		                    </thead>
		                    <tbody>
		                   @foreach($order->orderItems as $item)
		                        <tr>
		                            <td>{{$item->name}}</td>
		                            <td>{{$item->pivot->qty}}</td>
		                            <td>{{$item->pivot->total}}</td>
		                            
		                        </tr>
		                    @endforeach
		                    
		                    </tbody>
		                </table>
	            	</div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection