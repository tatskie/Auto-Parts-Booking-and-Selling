@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <div class="section_title new_arrivals_title">
                <h2>Your Receipts</h2>
            </div>
        </div>
    </div>
    <div class="row align-items-center" style="margin-top: 70px;">
        <div class="col text-center">
            <div class="row">
                <div class="col-md-12">
	                <div class="newsletter" style="margin-top: -10px">
	               		  <table class="table table-hover">
		                    <thead>
		                    <tr>
		                        <th>Receipt No.</th>
		                        <th>Time & Date</th>
		                        <th>Service</th>
		                        <th>Price</th>
		                        <th>Status</th>
		                    </tr>
		                    </thead>
		                    <tbody>
		                   		@foreach($receipts as $receipt)
		                        <tr>
		                            <td>{{$receipt->receipt_no}}</td>
		                            <td>{{ \Carbon\Carbon::parse($receipt->reservation->time)->format('h:i A')}}, {{ \Carbon\Carbon::parse($receipt->reservation->date)->format('F j, Y')}}</td>
		                            <td>
		                                {{ucwords($receipt->reservation->product->name)}}
		                            </td>
		                            <td>
		                              	₱{{$receipt->reservation->product->price}}
		                            </td>

		                            <td>
		                            	@if($receipt->cancel == false)
		                            		@if($receipt->status == false)
		                                		<input type="submit" class="btn btn-warning" value="Cancel Booking" data-toggle="modal" data-target="#myModal{{$receipt->id}}">
		                                		<!-- Small modal -->

												  <div class="modal fade" id="myModal{{$receipt->id}}" role="dialog">
												    <div class="modal-dialog modal-sm">
												      <div class="modal-content">
												        <div class="modal-header">
												        	<h6 class="modal-title">Cancel Booking</h6>
												          <button type="button" class="close" data-dismiss="modal">&times;</button>
												          
												        </div>
												        <div class="modal-body">
												          <p>Are you sure you want to cancel booking {{ucwords($receipt->reservation->product->name)}}?</p>
												        </div>
												        <div class="modal-footer">
												        	<a href="{{route('receipts.edit', $receipt->id)}}" class="btn btn-warning">Submit</a>
												          	<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
												        </div>
												      </div>
												    </div>
												  </div>


		                                	@else
		                                		<input type="submit" class="btn btn-info" value="Done!">
		                                	@endif
		                                @else
		                                <input type="submit" class="btn btn-danger" value="Book Canceled!">
		                                @endif	                                
		                            </td>
		                        </tr>
		                    
		                    	@endforeach
		                    	{{$receipts->links()}}
		                    </tbody>
		                </table>
	            	</div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection