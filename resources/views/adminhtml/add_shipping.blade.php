@extends('adminhtml.adminlayout')

@section('navigation')

    <li><a href="{{route('dashboard')}}">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active"><a href="{{route('product_group')}}">Group</a></li>
    <li>Add Group</li>
@endsection
@section('Title')
    <h1 class="page-header">Add Shipping Fee</h1>
@endsection

@section('content')
    @if($errors->all())
        <div class="alert alert-danger" role="alert">
            Make sure your information correctly!
        </div>
    @elseif(\Session::has('exist'))
        <div class="alert alert-danger" role="alert">
            The record is already exist!
        </div>

    @endif
    <div class="panel panel-default">
        <div class="panel-heading">Shipping Information</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form style="width:80%;margin:0 auto;" class="form-horizontal" role="form" method="POST"
                          enctype="multipart/form-data"
                          action="{{ url('admin/shipping/add') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <p>Ship From</p>
                            <select name="ship_from" class="form-control">
                                <option selected> Choose Repository</option>
                                @foreach($repository as $item)
                                    <option value="{{$item->repository_id}}">{{$item->repository_name}}</option>
                                    @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <p>Ship to</p>
                            <select name="ship_to" class="form-control">
                                <option selected> Choose City</option>
                                @foreach($city as $item)
                                    <option value="{{$item->city_id}}">{{$item->city_name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <p>Shipping Fee</p>
                            <input type="text" name="fee" class="form-control" />

                        </div>

                        <button type="submit" class="btn btn-primary " >Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
