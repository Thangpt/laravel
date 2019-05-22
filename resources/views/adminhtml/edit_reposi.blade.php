@extends('adminhtml.adminlayout')
@section('navigation')

    <li><a href="{{route('dashboard')}}">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active"><a style="text-decoration:none;" href="{{route('repository')}}">Repository</a></li>
    <li>Edit Repository</li>
@endsection
@section('Title')
    <h1 class="page-header">Edit Repository</h1>
@endsection

@section('content')
    @if($errors->all())
        <div class="alert alert-danger" role="alert">
            Please fill correctly input!
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">Repository Information</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form style="width:80%;margin:0 auto;" class="form-horizontal" role="form" method="POST"
                          enctype="multipart/form-data"
                          action="{{ url('admin/repository/edit') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <p>Name</p>
                            <input type="text" name="repository_name" value="{{$repository->repository_name}}"
                                   class="form-control"/>
                            <input type="hidden" name="repository_id" value="{{$repository->repository_id}}">

                        </div>
                        <div class="form-group">
                            <p>Location</p>
                            <select name="city_id">
                                @foreach($city as $item)
                                    @if($repository->city_id==$item->city_id)
                                        <option selected value="{{$item->city_id}}">{{$item->city_name}}</option>
                                    @else
                                        <option value="{{$item->city_id}}">{{$item->city_name}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
