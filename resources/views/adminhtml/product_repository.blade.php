@extends('adminhtml.adminlayout')

@section('navigation')

    <li><a href="dashboard">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active">Product Repository</li>
@endsection
@section('Title')
    <h1 class="page-header">Product Repository</h1>
@endsection



@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">All Product in Repository</div>
                <div class="panel-body">
                    <table class="table" style="text-align:center">
                        <thead>
                        <tr>
                            <th scope="col">Repository</th>
                            <th scope="col">Product</th>
                            <th scope="col">Product ID</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Edit Quantity</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product_repository as$item)
                            <tr>
                                <th>{{$item->Reposi->repository_name}}</th>
                                <th>{{$item->Product->product_name}}</th>
                                <th>{{$item->product_id}}</th>
                                <th>{{$item->quantity}}</th>
                                <th><a style="text-decoration:none"
                                       href="product_repository/edit/{{$item->repository_id}}/{{$item->product_id}}">
                                        Edit</a></th>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$product_repository->links()}}

                </div>
            </div>
        </div>
    </div>
@endsection
