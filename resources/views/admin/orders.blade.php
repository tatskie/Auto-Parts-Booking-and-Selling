@extends('admin.layout.app')
@section('title')
South Road by CCF | Admin Dashboard
@endsection
@section('content')
            <div class="page-title">
              <div class="title_left">
                <h1><i class="fa fa-pencil"></i> Orders
                
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
                    <h2> Orders <small>Sessions</small></h2>
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

                    <ul>
        @foreach($orders as $order)
            <li>
                <h4>Order by {{ucwords($order->user->first_name)}} {{ucwords($order->user->last_name)}} 
                    <br> 
                    Contact {{$order->user->contact}}
                    <br>
                    Total Price {{$order->total}}
                    <br>
                   
                </h4>
                @if($order->cancel == 0)
                <form action="{{route('toggle.deliver',$order->id)}}" method="POST" class="pull-right" id="deliver-toggle">
                    {{csrf_field()}}
                    <label for="delivered">Delivered</label>
                    <input type="checkbox" value="1" name="delivered"  {{$order->delivered==1?"checked":"" }}>
                    <input type="submit" class="btn btn-success btn-sm btn-round" value="Submit">
                </form>
                @else
                <div class="pull-right">
                    <button class="btn btn-warning btn-sm btn-round">Order Canceled</button>
                </div>
                @endif
                <div class="pull-right">
                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info btn-sm btn-round" data-toggle="modal" data-target="#exampleModalLong{{$order->id}}">
                      View Address
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">{{ucwords($order->user->first_name)}} {{ucwords($order->user->last_name)}} Order</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h4>Order No: {{$order->id}}</h4>
                            <h4>Address: {{ucwords($order->address->addressline)}} 
                              {{ucwords($order->address->street)}}, {{ucwords($order->address->city)}}, {{ucwords($order->address->province)}}, {{ucwords($order->address->zip)}} 
                            </h4>
                            <h4>Contact: {{ucwords($order->address->phone)}} 
                               
                            </h4>
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
                <div class="clearfix"></div>
                <hr>
                <h5>Items</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>qty</th>
                        <th>price</th>
                    </tr>
                    @foreach($order->orderItems as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->pivot->qty}}</td>
                            <td>{{$item->pivot->total}}</td>
                        </tr>

                    @endforeach
                </table>
            </li>

        @endforeach

    </ul>

    {{$orders->links()}}
                  </div>
                </div>
              </div>
            </div>

    
@endsection

