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
                            <li>Search</li>

                        </ol>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">Search Result</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
                                    @foreach($all_products as $item)
                                        @if(strpos(strtolower($item->group_name),strtolower($key->key))!==false ||
                                         strpos(strtolower($item->description),strtolower($key->key))!==false)
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                                <div class="product_item">
                                                    <p><a href="{{url('/product/'.$item->group_id)}}" class="product_name">{{$item->group_name}}</a></p>
                                                    <div class="product-image">
                                                        <a href="{{url('/product/'.$item->group_id)}}"><img src="{{asset('/upload/group/'.$item->image)}}"
                                                                        alt=""
                                                                        class=""></a>
                                                    </div>
                                                    <p><span class='price text-right'>{{$item->product()->first()->price}} VND</span>

                                                    </p>

                                                    <a href="{{url('/product/'.$item->group_id)}}">
                                                        <button class='btn btn-info'><span
                                                                class="glyphicon glyphicon-shopping-cart"
                                                                aria-hidden="true"></span> Xem chi tiết
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach


                                </div>
                                {{$all_products->links()}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
