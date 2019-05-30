@extends('layouts/site')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding" style="margin-top: 15px;">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 clearpaddingl">
                    {{--<div class="panel panel-info" style="margin-bottom: 5px;">--}}
                    {{--<div class="panel-heading">--}}
                    {{--<h3 class="panel-title">Tìm kiếm</h3>--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal text-center">--}}
                    {{--<div class="form-group form-group-sm">--}}
                    {{--<label class="col-sm-5 clearpaddingl control-label" for="formGroupInputSmall">Danh--}}
                    {{--mục</label>--}}
                    {{--<div class="col-sm-7" style="padding-left: 0px">--}}
                    {{--<select class="form-control">--}}
                    {{--<option>1</option>--}}
                    {{--<option>2</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group form-group-sm">--}}
                    {{--<label class="col-sm-5 control-label" for="formGroupInputSmall">Giá từ:</label>--}}
                    {{--<div class="col-sm-7" style="padding-left: 0px">--}}
                    {{--<select class="form-control">--}}
                    {{--<option>1</option>--}}
                    {{--<option>2</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group form-group-sm">--}}
                    {{--<label class="col-sm-5 control-label" for="formGroupInputSmall">đến:</label>--}}
                    {{--<div class="col-sm-7" style="padding-left: 0px">--}}
                    {{--<select class="form-control">--}}
                    {{--<option>1</option>--}}
                    {{--<option>2</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<button class="btn btn-info" type="submit" name='submit'>TÌm kiếm</button>--}}
                    {{--</form>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <div class="panel panel-info">
                        <div class="panel-body" style="padding:0px">

                            @foreach($categories as $category)
                                <div class="list-group">
                                    <a href="{{url('/category/'.$category->category_id)}}"
                                       class="list-group-item active">
                                        {{$category->category_name}}
                                    </a>
                                    @foreach($sub_categories as $sub_category)
                                        @if($sub_category->category_parent==$category->category_id)
                                            <a href="{{url('/category/'.$sub_category->category_id)}}"
                                               class="list-group-item">{{$sub_category->category_name}}</a>
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
                            <li>Cart</li>

                        </ol>
                        @if($errors->all())
                            <div class="alert alert-danger" role="alert">
                                Make sure your information correctly!
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{route('update_cart')}}">
                            {{ csrf_field() }}
                            <div class="row" style="border-bottom: solid 0.5px;">
                                <div class="col-xs-3">Image</div>
                                <div class="col-xs-3">Name</div>
                                <div class="col-xs-3">Quantity</div>
                                <div class="col-xs-3">Price (per one)</div>
                            </div>

                            @foreach($cart as $item )
                                @if($item->quantity > 0)
                                    <div class="row " style="border-bottom: 10px; padding:10px">
                                        <div class="col-xs-3"><img style="width:40px;border-radius: 30%"
                                                                   src="{{asset('upload/product/'.$item->Product->product_image)}}"/>
                                        </div>
                                        <div class="col-xs-3">{{$item->Product->product_name}}</div>
                                        <div class="col-xs-3"><input class="form-control" type="text"
                                                                     name="product{{$item->product_id}}"
                                                                     value="{{$item->quantity}}"/></div>
                                        <div class="col-xs-3">{{$item->Product->price}} VND</div>
                                    </div>
                                @endif
                            @endforeach


                            <input class="btn btn-primary" style="margin:15px auto;padding:15px" type="submit"
                                   name="update" value="Update Cart"/>
                            <input class="btn btn-warning" style="margin:15px auto;padding:15px;float:right" name="buy"
                                   type="submit" value="Buy"/>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
