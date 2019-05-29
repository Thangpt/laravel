@extends('adminhtml.adminlayout')

@section('navigation')

    <li><a href="{{route('dashboard')}}">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active">New Orders</li>
@endsection
@section('Title')
    <h1 class="page-header">New Orders</h1>
@endsection

@section('content')
    @if(count($order)==0)
        <h3>There no New Order</h3>

    @else
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">New Orders</div>
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
                                <th scope="col">Total</th>
                                <th scope="col">Shipping Fee</th>
                                <th scope="col">More Details</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as$item)
                                <tr style="text-align:center">
                                    <th scope="row">{{$item->order_id}}</th>
                                    <th>{{$item->orderUser->name}}</th>
                                    <th>{{$item->address}}</th>
                                    <th>{{$item->phone_number}}</th>
                                    <th>{{$item->total_price}}</th>
                                    <th>{{$item->shipping_fee}}</th>
                                    <th><a style="text-decoration:none;" href="{{route('order')}}/details/{{$item->order_id}}">Show</a></th>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div><!--/.row-->
    @endif
@endsection
