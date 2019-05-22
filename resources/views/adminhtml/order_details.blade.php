@extends('adminhtml.adminlayout')

@section('navigation')

    <li><a href="{{route('dashboard')}}">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active"><a href="{{route('order')}}" style="text-decoration:none">Orders</a></li>
    <li>Details</li>
@endsection
@section('Title')
    <h1 class="page-header">Order Details</h1>
@endsection

@section('content')
    @if(\Session::has('success'))
        <div class="alert alert-success" role="alert">
            Prepared Order!
        </div>
    @endif
    @if($order)
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">All Orders</div>
                <div class="panel-body">
                    <table style="width:100%; padding:10px; text-align:center"  data-show-refresh="true"
                           data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1"
                           data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Address</th>
                            <th scope="col">Customer Phone Number</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Shipping Fee</th>
                            <th scope="col">Send</th>
                            <th scope="col">Received</th>



                        </tr>
                        </thead>
                        <tbody>

                            <tr style="text-align:center">
                                <th scope="row">{{$order->order_id}}</th>
                                <th>{{$order->orderUser->name}}</th>
                                <th>{{$order->address}}</th>
                                <th>{{$order->phone_number}}</th>
                                <th>{{$order->total_price}}</th>
                                <th>{{$order->shipping_fee}}</th>
                                <th>{{$order->is_send}}</th>
                                <th>{{$order->is_received}}</th>

                            </tr>

                        </tbody>
                    </table>


                </div>
                <div class="panel-heading">All Order Products</div>
                <div class="panel-body">
                    <table style="width:100%; padding:10px; text-align:center"  data-show-refresh="true"
                           data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1"
                           data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Group Product</th>
                            <th scope="col">Descritpion</th>
                            <th scope="col">Size</th>
                            <th scope="col">Color</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>




                        </tr>
                        </thead>
                        <tbody>

                        @foreach($order->OrderItem as $item)
                        <tr style="text-align:center">
                            <th scope="row">{{$item->product_id}}</th>
                            <th>{{$item->Product->product_name}}</th>
                            <th>{{$item->Product->Group->group_name}}</th>
                            <th>{{$item->Product->description}}</th>
                            <th>{{$item->Product->size}}</th>
                            <th>{{$item->Product->color}}</th>
                            <th>{{$item->Product->price}}</th>
                            <th>{{$item->quantity}}</th>

                        </tr>
                            @endforeach

                        </tbody>
                    </table>

                    Total Bill : {{$order->total_price + $order->shipping_fee}}

                    @if(!$order->is_send)
                        <button class="btn btn-primary" style="float:right"><a style="color:white;text-decoration:none;" href="{{route('order')}}/prepare/{{$order->order_id}}" style="text-decoration:none">Prepare Order</a></button>
                        @endif

                </div>
            </div>
        </div>
    </div><!--/.row-->


    @else
        <h3>There no order</h3>
    @endif
@endsection
