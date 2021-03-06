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
