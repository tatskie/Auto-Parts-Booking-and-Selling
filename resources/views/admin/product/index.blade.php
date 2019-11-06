@extends('admin.layout.app')
@section('title')
South Road by CCF | Products Dashboard

@endsection

@section('content') 

    <div class="page-title">
              <div class="title_left">
                <h1><i class="fa fa-pencil"></i> Products
                
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target="#exampleModal">
                      Add Product
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-8 col-md-offset-2">
                                  {!! Form::open(['route' => 'product.store', 'method' => 'POST', 'files' => true, 'data-parsley-validate'=>'']) !!}

                                  <div class="form-group">
                                      {{ Form::label('name', 'Name') }}
                                      {{ Form::text('name', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
                                  </div>

                                  <div class="form-group">
                                      {{ Form::label('description', 'Description') }}
                                      {{ Form::text('description', null, array('class' => 'form-control')) }}
                                  </div>
                                  <div class="form-group">
                                      {{ Form::label('price', 'Price') }}
                                      {{ Form::text('price', null, array('class' => 'form-control')) }}
                                  </div>

                                  <div class="form-group">
                                      {{ Form::label('stocks', 'Stocks') }}
                                      {{ Form::number('stocks', null, array('class' => 'form-control')) }}
                                  </div>
                                  <!-- <div class="form-group">
                                      {{ Form::label('size', 'Size') }}
                                      {{ Form::select('size', [ 'small' => 'Small', 'medium' => 'Medium','large'=>'Large'], null, ['class' => 'form-control']) }}
                                  </div> -->

                                  <div class="form-group">
                                      {{ Form::label('category_id', 'Categories') }}
                                      {{ Form::select('category_id', $categories, null, ['class' => 'form-control','placeholder'=>'Select Category']) }}
                                  </div>

                                  <div class="form-group">
                                      {{ Form::label('image', 'Image') }}
                                      {{ Form::file('image',array('class' => 'form-control')) }}
                                  </div>

                                   
                                  

                              </div>
                          </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                            {!! Form::close() !!}
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Posts <small>Sessions</small></h2>
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

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th>Product Stocks</th>
                                    <th>Product Price</th>
                                    <th>Date/Time Added</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                  <td><a href="#">{{ ucwords($product->name) }}</a></td>
                                    <td>{{count($product->category)?$product->category->name:"N/A"}}</td>
                                    <td>{!! $product->stocks !!}</td>
                                    <td>₱{!! $product->price !!}</td>
                                    <td>{{ $product->created_at->format('F d, Y h:ia') }}</td>
                                    <td>
                                    <a href="#" class="btn btn-success btn-sm btn-round pull-left" data-toggle="modal" data-target="#myModal{{$product->id}}">View Details</a>
                                    <!-- details -->
                                    <a href="#" class="btn btn-warning btn-sm btn-round pull-left" data-toggle="modal" data-target="#DeletePost{{$product->id}}">Delete Post</a>
                                    </td>
  
                                    

                                </tr>
                                <!-- Modal -->
                <div id="myModal{{$product->id}}" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{ ucwords($product->name) }}</h4>
                      </div>
                      <div class="modal-body">

                         @foreach ($product->images as $image)
          
                            <img src="{{$image->image_path}}" style="max-width: 150px">
                    
                          @endforeach
                        <h4>Category: {{count($product->category)?ucwords($product->category->name):"N/A"}}</h4>

                         

                         
                         <form enctype="multipart/form-data" action="{{url('/admin/product/image-upload/'. $product->id)}}" method="POST" novalidate files="true">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <input type="file" name="image" style="margin-left: 180px;">
                        
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-info">Edit Product</a>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- Delete Modal -->
                <div id="DeletePost{{$product->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog" role="document">

                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="card-text">Delete Post</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p class="card-text">Are you sure you want to delete {{ucwords($product->name)}} ?</p>


                        </div>
                                
                                <div class="modal-footer">
                                    <form action="{{route('product.destroy',$product->id)}}"  method="POST">
                                       {{csrf_field()}}
                                       {{method_field('DELETE')}}
                                       <input class="btn btn-sm btn-warning" type="submit" value="Delete">
                                     </form>
                                    
                                    <button class="btn btn-primary btn-sm" type="button" data-dismiss="modal">No</button>
                                </div>
                                
                        </div>
                    </div>
                </div> 
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                    {!!$products->links()!!}

                  </div>
                </div>
              </div>
            </div>


    <!-- <h3>Products</h3>

<ul class="container">
    @forelse($products as $product)
    <li class="row">


       <div class="col-md-8">
        <h4>Name of product:{{$product->name}}</h4>
        <h4>Category:{{count($product->category)?$product->category->name:"N/A"}}</h4>
        @foreach ($product->images as $image)
          
          <img src="{{$image->image_path}}" style="max-width: 100px">
  
        @endforeach
      <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-sm ">Edit Product</a>
      <br>

        <form action="{{route('product.destroy',$product->id)}}"  method="POST">
           {{csrf_field()}}
           {{method_field('DELETE')}}
           <input class="btn btn-sm btn-danger" type="submit" value="Delete">
         </form>

         <div class="col-md-4">
            
            <form action="/admin/product/image-upload/{{$product->id}}" method="POST" class="dropzone" id="my-awesome-dropzone-{{$product->id}}">
              {{csrf_field()}}

             </form>

        </div>

    </li>

        @empty

        <h3>No products</h3>

    @endforelse
</ul>
 -->


@endsection