@extends('layouts/site')
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 clearpaddingl">
                {{--<div class="panel panel-info" style="margin-bottom: 5px;">--}}
                {{--<div class="panel-heading">--}}
                {{--<h3 class="panel-title">Tìm kiếm</h3>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                {{--<form class="form-horizontal text-center">--}}
                {{--<div class="form-group form-group-sm">--}}
                {{--<label class="col-sm-5 clearpaddingl control-label" for="formGroupInputSmall">Danh--}}
                {{--mục</label>--}}
                {{--<div class="col-sm-7" style="padding-left: 0px">--}}
                {{--<select class="form-control">--}}
                {{--<option>1</option>--}}
                {{--<option>2</option>--}}
                {{--</select>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group form-group-sm">--}}
                {{--<label class="col-sm-5 control-label" for="formGroupInputSmall">Giá từ:</label>--}}
                {{--<div class="col-sm-7" style="padding-left: 0px">--}}
                {{--<select class="form-control">--}}
                {{--<option>1</option>--}}
                {{--<option>2</option>--}}
                {{--</select>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group form-group-sm">--}}
                {{--<label class="col-sm-5 control-label" for="formGroupInputSmall">đến:</label>--}}
                {{--<div class="col-sm-7" style="padding-left: 0px">--}}
                {{--<select class="form-control">--}}
                {{--<option>1</option>--}}
                {{--<option>2</option>--}}
                {{--</select>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<button class="btn btn-info" type="submit" name='submit'>TÌm kiếm</button>--}}
                {{--</form>--}}
                {{--</div>--}}
                {{--</div>--}}
                <div class="panel panel-info">
                    <div class="panel-body" style="padding:0px">

                        @foreach($categories as $category)
                            <div class="list-group">
                                <a href="{{url('/category/'.$category->category_id)}}" class="list-group-item active">
                                    {{$category->category_name}}
                                </a>
                                @foreach($sub_categories as $sub_category)
                                    @if($sub_category->category_parent==$category->category_id)
                                        <a href="{{url('/category/'.$sub_category->category_id)}}"
                                           class="list-group-item">{{$sub_category->category_name}}</a>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 clearpaddingr">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                Home</a>
                        </li>
                        <li>Order Detail</li>

                    </ol>
                    @if($errors->all())
                        <div class="alert alert-danger" role="alert">
                            Make sure your information correctly!
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">My Order</div>
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
                                            <th>{{$data->name}}</th>
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



                                </div>
                            </div>
                        </div>
                    </div><!--/.row-->

                </div>
            </div>
        </div>
    </div>
@endsection