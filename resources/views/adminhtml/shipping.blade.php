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
                <div class="panel-heading">All Shipping Information</div>
                <div class="panel-body">
                    <table style="width:100%; padding:10px"  data-show-refresh="true"
                           data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1"
                           data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table">
                        <thead>
                        <tr>
                            <th scope="col" style="color:#30a5ff">Ship From</th>
                            <th scope="col" style="color:#30a5ff">Ship To</th>
                            <th scope="col" style="color:#30a5ff">Price (d)</th>
                            <th scope="col" style="color:#30a5ff">Edit</th>
                            <th scope="col" style="color:#30a5ff">Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ship as $item)
                            <tr>
                                <th scope="row">{{$item->Repository->repository_name}}</th>
                                <th>{{$item->City->city_name}}</th>
                                <th>{{$item->fee}}</th>
                                <th><a style="text-decoration:none;color:#80BEAF" href="shipping/edit/{{$item->ship_from}}/{{$item->ship_to}}">Edit</a></th>
                                <th><a style="text-decoration:none;color:orangered" href="shipping/delete/{{$item->ship_from}}/{{$item->ship_to}}}">Delete</a></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$ship->links()}}

                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div>
        <button  type="button" class="btn btn-primary"><a style="color:black;text-decoration:none" href="shipping/add">Add Shipping Fee</a></button>
    </div>
@endsection
