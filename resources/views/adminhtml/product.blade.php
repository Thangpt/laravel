@extends('adminhtml.adminlayout')

@section('navigation')

    <li><a href="{{route('dashboard')}}">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active">Products</li>
@endsection
@section('Title')
    <h1 class="page-header">Products</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">All Products</div>
                <div class="panel-body">
                    <table style="width:100%; padding:10px; text-align:center"  data-show-refresh="true"
                           data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1"
                           data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table">
                        <thead>
                        <tr>
                            <th scope="col" style="color:#30a5ff">ID</th>
                            <th scope="col" style="color:#30a5ff">Name</th>
                            <th scope="col" style="color:#30a5ff">Group</th>
                            <th scope="col" style="color:#30a5ff">Description</th>
                            <th scope="col" style="color:#30a5ff">Size</th>
                            <th scope="col" style="color:#30a5ff">Color</th>
                            <th scope="col" style="color:#30a5ff">Price</th>
                            <th scope="col" style="color:#30a5ff">Edit</th>
                            <th scope="col" style="color:#30a5ff">Edit Quantity In Repository</th>
                            <th scope="col" style="color:#30a5ff">Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $item)
                            <tr style="text-align:center">
                                <th scope="row">{{$item->product_id}}</th>
                                <th>{{$item->product_name}}</th>
                                <th>{{$item->group->group_name}}</th>
                                <th>{{$item->description}}</th>
                                <th>{{$item->getSize->name}}</th>
                                <th>{{$item->getColor->name}}</th>
                                <th>{{$item->price}}</th>
                                <th><a style="text-decoration:none;color:#EE9C6C" href="product/edit/{{$item->product_id}}">Edit</a></th>
                                <th>
                                        <a style="color:#80BEAF;text-decoration:none" href="product/quantity/{{$item->product_id}}">Edit Quantity</a></th>
                                <th>
                                        <a style="color:orangered;text-decoration:none" href="product/delete/{{$item->product_id}}">Delete</a></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$product->links()}}

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
    <button  type="button" class="btn btn-primary"><a style="color:whitesmoke;text-decoration:none" href="product/add">Add Product</a></button>
</div>
@endsection
