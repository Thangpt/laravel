@extends('adminhtml.adminlayout')

@section('navigation')

    <li><a href="{{route('dashboard')}}">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active">Settings</li>
    <li>Shipping</li>
@endsection
@section('Title')
    <h1 class="page-header">Shipping</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">All Shipping Infromation</div>
                <div class="panel-body">
                    <table style="width:100%; padding:10px"  data-show-refresh="true"
                           data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1"
                           data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table">
                        <thead>
                        <tr>
                            <th scope="col">Ship From</th>
                            <th scope="col">Ship To</th>
                            <th scope="col">Price (d)</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart->where('user_id',1) as $item)
                            {{--@if($item->user_id == $user->id)--}}
                            <tr>
                                <th scope="row">{{$item->user_id}}</th>
                                <th>{{$item->quantity}}</th>
                                <th>{{$item->product_id}}</th>

                            </tr>
                            {{--@endif--}}
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div>
        <button  type="button" class="btn btn-success"><a style="color:black;text-decoration:none" href="shipping/add">Add Shipping Fee</a></button>
    </div>
@endsection
