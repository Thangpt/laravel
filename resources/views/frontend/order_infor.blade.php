@extends('layouts/site')
@section('content')
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
                        <li>Order Information</li>

                    </ol>
                    @if($errors->all())
                        <div class="alert alert-danger" role="alert">
                            Make sure your information correctly!
                        </div>
                    @endif
                    <div class="panel panel-info " style="margin-bottom: 15px">

                        <div class="panel-heading">Order Information</div>
                        <div class="panel-body">
                            <div class="row">

                                    <form style="width:80%;margin:0 auto;" class="form-horizontal" role="form"
                                          method="POST"
                                          action="{{ url('user/order_create') }}">
                                        {{ csrf_field() }}
                                        <table style="width:100%; padding:10px"  data-show-refresh="true"
                                               data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1"
                                               data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table">
                                            <input type="hidden" name="name" value="{{$data->name}}"/>
                                            <input type="hidden" name="city" value="{{$data->city}}"/>
                                            <input type="hidden" name="total_price" value="{{$cost[0]}}"/>
                                            <input type="hidden" name="total_fee" value="{{$cost[1]}}"/>
                                            <input type="hidden" name="address" value="{{$data->address}}"/>
                                            <input type="hidden" name="phone_number" value="{{$data->phone_number}}"/>


                                            <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Phone Number</th>
                                                <th scope="col">Provine</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Total Price</th>
                                                <th scope="col">Shipping Fee</th>
                                                <th>Total Bill</th>



                                            </tr>
                                            </thead>
                                            <th scope="col">{{$data->name}}</th>
                                            <th scope="col">+84{{$data->phone_number}}</th>
                                            <th scope="col">
                                                @foreach($city as $item)
                                                    @if($data->city==$item->city_id)
                                                        {{$item->city_name}}
                                                    @endif
                                                    @endforeach
                                            </th>

                                            <th scope="col">{{$data->address}}</th>
                                            <th scope="col">{{$cost[0]}}</th>
                                            <th scope="col">{{$cost[1]}}</th>
                                            <th>{{$cost[0] + $cost[1]}}</th>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-primary">Contine</button>
                                    </form>

                            </div>
                        </div>

                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">All Products Information</div>
                        <div class="panel-body">
                            <table style="width:100%; padding:10px"  data-show-refresh="true"
                                   data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1"
                                   data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $item)
                                    @if($item->user_id == \Illuminate\Support\Facades\Auth::user()->id && $item->quantity >0)
                                    <tr>
                                        <th scope="row">
                                            <div>
                                                <img style="width:40px;border-radius: 30%" src="{{asset('upload/product/'.$item->Product->product_image)}}"/>
                                            </div>
                                        </th>
                                        <th>{{$item->Product->product_name}}</th>
                                        <th>{{$item->quantity}}</th>
                                        <th>{{$item->Product->price}}</th>

                                    </tr>
                                    @endif
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
