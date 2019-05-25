@extends('adminhtml.adminlayout')

@section('navigation')

<li><a href="dashboard">
        <svg class="glyph stroked home">
            <use xlink:href="#stroked-home"></use>
        </svg>
    </a></li>
<li class="active">Users</li>
@endsection
@section('Title')
<h1 class="page-header">Users</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">All Users</div>
            <div class="panel-body">
                <table style="width:100%; padding:10px"  data-show-refresh="true"
                       data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1"
                       data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table">
                    <thead>
                    <tr>
                        <th scope="col" style="color:#30a5ff">ID</th>
                        <th scope="col" style="color:#30a5ff">Name</th>
                        <th scope="col" style="color:#30a5ff">UserName</th>
                        <th scope="col" style="color:#30a5ff">Email</th>
                        <th scope="col" style="color:#30a5ff">Edit</th>
                        <th scope="col" style="color:#30a5ff">Delete</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as$item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <th>{{$item->name}}</th>
                        <th>{{$item->username}}</th>
                        <th>{{$item->email}}</th>
                        <th><a style="text-decoration:none;color:#EE9C6C" href="user/edit/{{$item->id}}">Edit</a></th>
                        <th><a style="text-decoration:none;color:orangered" href="user/delete/{{$item->id}}">Delete</a></th>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$users->links()}}

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
    <button  type="button" class="btn btn-primary"><a style="color:white;text-decoration:none" href="user/add">Add User</a></button>
</div>
@endsection
