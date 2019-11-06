@extends('admin.layout.app')
@section('title')
South Road by CCF | Admin Dashboard
@endsection
@section('content')
            <div class="page-title">
              <div class="title_left">
                <h1><i class="fa fa-pencil"></i> Appointments
                
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    

                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Appointments <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

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
                          @foreach($books as $receipt)
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
                                        <input type="submit" class="btn btn-warning btn-sm btn-round" value="Mark as Done!" data-toggle="modal" data-target="#myModal{{$receipt->id}}">
                                        <!-- Small modal -->

                                        <div class="modal fade" id="myModal{{$receipt->id}}" role="dialog">
                                          <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h6 class="modal-title">Mark as Done!</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                
                                              </div>
                                              <div class="modal-body">
                                                <p>{{$receipt->receipt_no}} with {{ucwords($receipt->reservation->product->name)}} paid from {{ucwords($receipt->user->name)}} Marked as done!</p>
                                              </div>
                                              <div class="modal-footer">
                                                <a href="{{route('marked', $receipt->id)}}" class="btn btn-warning">Submit</a>
                                                  <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>


                                      @else
                                        <input type="submit" class="btn btn-success btn-sm btn-round" value="Appointment Done!">
                                      @endif
                                    @else
                                    <input type="submit" class="btn btn-danger btn-sm btn-round" value="Book Canceled!">
                                    @endif      
                                    <input type="submit" class="btn btn-info btn-sm btn-round" value="Details" data-toggle="modal" data-target="#details{{$receipt->id}}">
                                        <!-- Small modal -->

                                        <div class="modal fade" id="details{{$receipt->id}}" role="dialog">
                                          <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h6 class="modal-title">Booked details</h6>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                
                                              </div>
                                              <div class="modal-body">
                                                <div class="form-group">
                                                  <h4>Receipt No: {{$receipt->receipt_no}}</h4>
                                                  <h4>Costumer Name: {{$receipt->user->name}}</h4>
                                                  <h4>Time Booked: {{ \Carbon\Carbon::parse($receipt->reservation->time)->format('h:i A')}}</h4>
                                                  <h4>Date Booked: {{ \Carbon\Carbon::parse($receipt->reservation->date)->format('F j, Y')}}</h4>
                                                  <h4>Service: {{ucwords($receipt->reservation->product->name)}}</h4>
                                                  <h4>Status: 
                                                    @if($receipt->cancel == false)
                                                      @if($receipt->status == false)
                                                        Pending!
                                                      @else
                                                        Done! {{$receipt->updated_at->diffForHumans()}}...
                                                      @endif
                                                    @else
                                                      Book Canceled! {{$receipt->updated_at->diffForHumans()}}...
                                                    @endif
                                                  </h4>
                                                  
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>                            
                                </td>
                            </tr>
                            @endforeach

                          {{$books->links()}}
                        
                        </tbody>
                    </table>

                    
                  </div>
                </div>
              </div>
            </div>

    
@endsection

