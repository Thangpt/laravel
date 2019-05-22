@extends('adminhtml.adminlayout')

@section('navigation')

    <li><a href="dashboard">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active">Repository</li>
@endsection
@section('Title')
    <h1 class="page-header">Repositories</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">All Repositories</div>
                <div class="panel-body">
                    <table class="table" style="text-align:center">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">City</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($repository as$item)
                            <tr>
                                <th>{{$item->repository_id}}</th>
                                <th>{{$item->repository_name}}</th>
                                <th>{{$item->City->city_name}}</th>
                                <th><a style="text-decoration:none;" href="repository/edit/{{$item->repository_id}}">Edit</a>
                                </th>
                                <th><a style="text-decoration:none;color:orangered"
                                       href="product/delete/{{$item->repository_id}}">Delete</a></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$repository->links()}}
                    <button type="button" class="btn btn-success"><a style="color:black;text-decoration:none"
                                                                     href="repository/add">Add Repository</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection
