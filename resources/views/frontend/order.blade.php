@extends('layouts/site')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 clearpaddingl">

                    <div class="panel panel-info">
                        <div class="panel-body" style="padding:0px">

                            @foreach($categories as $category)
                                <div class="list-group">
                                    <div class="list-group-item active"><a class="list-group-item active"
                                                                           href="{{url('/category/'.$category->category_id)}}">
                                            {{$category->category_name}}
                                        </a></div>
                                    @foreach($sub_categories as $sub_category)
                                        @if($sub_category->category_parent==$category->category_id)
                                            <div class="list-group-item dropdown">
                                                <button class="list-group-item" type="button" id="dropdownMenuButton"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a style="text-decoration:none;"
                                                        href="{{url('/category/'.$sub_category->category_id)}}">{{$sub_category->category_name}}</a>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @foreach($third_categories as $third_category)
                                                        @if($third_category->category_parent == $sub_category->category_id)
                                                            <a class="dropdown-item list-group-item" style="display: block" href="{{url('category/'.$third_category->category_id)}}">{{$third_category->category_name}}</a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
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
                            <li>All My Orders</li>

                        </ol>
                        @if($errors->all())
                            <div class="alert alert-danger" role="alert">
                                Make sure your information correctly!
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">All My Orders</div>
                                    <div class="panel-body">
                                        <table style="width:100%; padding:10px; text-align:center"
                                               data-show-refresh="true"
                                               data-show-toggle="true" data-show-columns="true" data-search="true"
                                               data-select-item-name="toolbar1"
                                               data-pagination="true" data-sort-name="name" data-sort-order="desc"
                                               class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Contact Name</th>
                                                <th scope="col"> Address</th>
                                                <th scope="col">Phone Number</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Shipping Fee</th>
                                                <th scope="col">More Details</th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order as$item)
                                                <tr style="text-align:center">
                                                    <th scope="row">{{$item->order_id}}</th>
                                                    <th>
                                                        {{--@foreach($item->hasUser() as $user)--}}
                                                        {{--{{$user->name}}--}}
                                                        {{--@endforeach--}}
                                                        {{$item->contact_name}}
                                                    </th>
                                                    <th>{{$item->address}}</th>
                                                    <th>{{$item->phone_number}}</th>
                                                    <th>{{$item->total_price}}</th>
                                                    <th>{{$item->shipping_fee}}</th>
                                                    <th><a style="text-decoration:none;"
                                                           href="{{url('user/order/detail/'.$item->order_id)}}">Show</a>
                                                    </th>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{$order->links()}}

                                    </div>
                                </div>
                            </div>
                        </div><!--/.row-->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
