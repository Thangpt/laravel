@extends('adminhtml.adminlayout')

@section('navigation')

    <li><a href="{{route('dashboard')}}">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active">Orders</li>
@endsection
@section('Title')
    <h1 class="page-header">Orders</h1>
@endsection

@section('content')
    @if(\Session::has('success'))
        <div class="alert alert-success" role="alert">
            Prepared Order!
        </div>
    @endif
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
                            <th scope="col" style="color:#30a5ff">ID</th>
                            <th scope="col" style="color:#30a5ff">Customer Name</th>
                            <th scope="col" style="color:#30a5ff">Customer Address</th>
                            <th scope="col" style="color:#30a5ff">Customer Phone Number</th>
                            <th scope="col" style="color:#30a5ff">Total Price</th>
                            <th scope="col" style="color:#30a5ff">Shipping Fee</th>
                            <th scope="col" style="color:#30a5ff">Send</th>
                            <th scope="col" style="color:#30a5ff">Received</th>
                            <th scope="col" style="color:#30a5ff">More Details</th>


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
                                    {{$item->orderUser->name}}
                                </th>
                                <th>{{$item->address}}</th>
                                <th>{{$item->phone_number}}</th>
                                <th>{{$item->total_price}}</th>
                                <th>{{$item->shipping_fee}}</th>
                                <th>{{$item->is_send}}</th>
                                <th>{{$item->is_received}}</th>
                                <th><a style="text-decoration:none;" href="order/details/{{$item->order_id}}">Show</a></th>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$order->links()}}

                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div>
        {{--<table class="table" style="text-align:center">--}}
        {{--<thead>--}}
        {{--<tr>--}}
        {{--<th scope="col">ID</th>--}}
        {{--<th scope="col">Name</th>--}}
        {{--<th scope="col">Group</th>--}}
        {{--<th scope="col">Description</th>--}}
        {{--<th scope="col">Size</th>--}}
        {{--<th scope="col">Color</th>--}}
        {{--<th scope="col">Price</th>--}}
        {{--<th scope="col">Edit</th>--}}
        {{--<th scope="col">Edit Quantity In Repository</th>--}}
        {{--<th scope="col">Delete</th>--}}

        {{--</tr>--}}
        {{--</thead>--}}
        {{----}}
        {{--</table>--}}
        <button  type="button" class="btn btn-primary"><a style="color:whitesmoke;text-decoration:none" href="product/add">Add Order</a></button>
    </div>
@endsection
