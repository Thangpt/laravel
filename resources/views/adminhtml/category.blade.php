@extends('adminhtml.adminlayout')

@section('navigation')

    <li><a href="{{route('dashboard')}}">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active">Category</li>
@endsection
@section('Title')
    <h1 class="page-header">Category</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">All Categories</div>
                <div class="panel-body">
                    <table style="width:100%; padding:10px" data-show-refresh="true"
                           data-show-toggle="true" data-show-columns="true" data-search="true"
                           data-select-item-name="toolbar1"
                           data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category Parent</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category as$item)
                            <tr>
                                <th scope="row">{{$item->category_id}}</th>
                                <th>{{$item->category_name}}</th>
                                <th>
                                    {{--{{$model->find($item->category_id)->category_name}}--}}
                                    @if($item->category_parent==0)
                                        {{__('Root')}}
                                    @else
                                        @foreach($model as $cate)
                                            @if($item->category_parent==$cate->category_id)
                                                {{$cate->category_name}}

                                            @endif
                                        @endforeach
                                    @endif
                                </th>
                                <th><a style="text-decoration:none;"
                                       href="category/edit/{{$item->category_id}}">Edit</a></th>
                                <th><a style="text-decoration:none;color:orangered"
                                       href="category/delete/{{$item->category_id}}">Delete</a></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$category->links()}}

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
        <button type="button" class="btn btn-primary"><a style="color:black;text-decoration:none" href="category/add">Add
                Category</a></button>
    </div>
@endsection
