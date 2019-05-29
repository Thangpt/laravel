@extends('adminhtml.adminlayout')

@section('navigation')

    <li><a href="dashboard">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active">Product Groups</li>
@endsection
@section('Title')
    <h1 class="page-header">Groups</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">All Product Groups</div>
                <div class="panel-body">
                    <table style="width:100%; padding:10px"  data-show-refresh="true"
                           data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1"
                           data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table">
                        <thead>
                        <tr>
                            <th scope="col" style="color:#30a5ff">ID</th>
                            <th scope="col" style="color:#30a5ff">Group Name</th>
                            <th scope="col" style="color:#30a5ff">Description</th>
                            <th scope="col" style="color:#30a5ff">Product Category</th>
                            <th scope="col" style="color:#30a5ff">Edit</th>
                            <th scope="col" style="color:#30a5ff">Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groups as $item)
                            <tr>
                                <th scope="row">{{$item->group_id}}</th>
                                <th>{{$item->group_name}}</th>
                                <th>{{$item->description}}</th>
                                {{--<th>{{$item->category()->get()->category_name }}</th>--}}
                                <th>
                                    {{--@foreach($category as $model)--}}
                                        {{--@if($item->product_category == $model->category_id)--}}
                                            {{--{{$model->category_name}}--}}
                                            {{--@endif--}}
                                        {{--@endforeach--}}
                                    {{$item->category->category_name}}



                                </th>
                                <th><a style="text-decoration:none;color:#EE9C6C" href="group/edit/{{$item->group_id}}">Edit</a></th>
                                <th><a style="text-decoration:none;color:orangered" href="group/delete/{{$item->group_id}}">Delete</a></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$groups->links()}}

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
        <button  type="button" class="btn btn-primary"><a style="color:whitesmoke;text-decoration:none" href="group/add">Add Product Group</a></button>
    </div>
@endsection
