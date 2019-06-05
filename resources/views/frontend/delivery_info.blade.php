@extends('layouts/site')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 clearpaddingl">
                    <div class="panel panel-info">
                        <div class="panel-body" style="padding:0px">

                            @foreach($categories as $category)
                                <div class="list-group">
                                    <div class="list-group-item active"><a class="list-group-item active"
                                                                           href="{{url('/category/'.$category->category_id)}}">
                                            {{$category->category_name}}
                                        </a></div>
                                    @foreach($sub_categories as $sub_category)
                                        @if($sub_category->category_parent==$category->category_id)
                                            <div class="list-group-item dropdown">
                                                <button class="list-group-item" type="button" id="dropdownMenuButton"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a style="text-decoration:none;"
                                                        href="{{url('/category/'.$sub_category->category_id)}}">{{$sub_category->category_name}}</a>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @foreach($third_categories as $third_category)
                                                        @if($third_category->category_parent == $sub_category->category_id)
                                                            <a class="dropdown-item list-group-item" style="display: block" href="{{url('category/'.$third_category->category_id)}}">{{$third_category->category_name}}</a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 clearpaddingr">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
                        <ol class="breadcrumb">
                            <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                    Home</a>
                            </li>
                            <li>Delivery Information</li>

                        </ol>
                        @if($errors->all())
                            <div class="alert alert-danger" role="alert">
                                Make sure your information correctly!
                            </div>
                        @endif
                        <div class="panel panel-info " style="margin-bottom: 15px">

                            <div class="panel-heading">Delivery Information</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <form style="width:80%;margin:0 auto;" class="form-horizontal" role="form"
                                              method="POST"
                                              action="{{ url('user/order_info') }}">
                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <p>Name</p>
                                                <input type="text" name="name" class="form-control" required/>

                                            </div>
                                            <div class="form-group">
                                                <p>Phone Number</p>
                                                <input type="text" name="phone_number" class="form-control" required
                                                       placeholder="+84"/>

                                            </div>


                                            <div class="form-group">
                                                <p>Provine</p>
                                                <select name="city" class="form-control">
                                                    <option selected>Choose Your Provine..</option>
                                                    @foreach($city as $item)

                                                        <option
                                                            value="{{$item->city_id}}">{{$item->city_name}}</option>

                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <p>Address</p>
                                                <input type="text" name="address" class="form-control" required/>

                                            </div>
                                            <button type="submit" class="btn btn-primary">Contine</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
