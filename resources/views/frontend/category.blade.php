@extends('layouts/site')
@section('content')
    <div class="container">
        <div class="row">
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
                                Trang chủ</a>
                        </li>
                        <li><a href="#">Danh mục sản phẩm</a></li>
                        @if($current_category->level==1)
                            <li><a href="#">{{$current_category->category_name}}</a></li>
                        @elseif($current_category->level==2)
                            @foreach($category->where('category_id',$current_category->category_parent)->get() as $item)
                                <li><a href="#">{{$item->category_name}}</a></li>
                            @endforeach
                        @elseif($current_category->level==3)
                            @foreach($category->where('category_id',$current_category->category_parent)->get() as $second)

                                @foreach($category->where('category_id',$second->category_parent)->get() as $first)
                                    <li><a href="#">{{$first->category_name}}</a></li>
                                    <li><a href="#">{{$second->category_name}}</a></li>
                                @endforeach
                            @endforeach
                        @endif

                    </ol>
                    <div class="panel panel-info " style="margin-bottom: 15px">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">{{$current_category->category_name}}
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
                                @if($current_category->level==3)
                                    @foreach($current_category->group as $group)



                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                            <div class="product_item">
                                                <p><a href="{{url('/product/'.$group->group_id)}}"
                                                      class="product_name">{{$group->group_name}}</a></p>
                                                <div class="product-image">
                                                    <a href="{{url('/product/'.$group->group_id)}}"><img
                                                            src="{{asset('upload/group/'.$group->image)}}"
                                                            alt="" class=""></a>
                                                </div>
                                                <p><span class='price text-right'>
                                            {{$group->product->first()->price}} VND
                                        </span>

                                                </p>

                                                <a href="{{url('/product/'.$group->group_id)}}">
                                                    <button class='btn btn-info'><span
                                                            class="glyphicon glyphicon-shopping-cart"
                                                            aria-hidden="true"></span> Xem chi tiết
                                                    </button>
                                                </a>
                                            </div>
                                        </div>



                                    @endforeach
                                @elseif($current_category->level==2)
                                    @foreach($category->where('category_parent',$current_category->category_id)->get() as $item )
                                        @foreach($item->group as $group)



                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                                <div class="product_item">
                                                    <p><a href="{{url('/product/'.$group->group_id)}}"
                                                          class="product_name">{{$group->group_name}}</a></p>
                                                    <div class="product-image">
                                                        <a href="{{url('/product/'.$group->group_id)}}"><img
                                                                src="{{asset('upload/group/'.$group->image)}}"
                                                                alt="" class=""></a>
                                                    </div>
                                                    <p><span class='price text-right'>
                                            {{$group->product->first()->price}} VND
                                        </span>

                                                    </p>

                                                    <a href="{{url('/product/'.$group->group_id)}}">
                                                        <button class='btn btn-info'><span
                                                                class="glyphicon glyphicon-shopping-cart"
                                                                aria-hidden="true"></span> Xem chi tiết
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>



                                        @endforeach
                                    @endforeach
                                @elseif($current_category->level==1)
                                    @foreach($category->where('category_parent',$current_category->category_id)->get() as $second)
                                        @foreach($category->where('category_parent',$second->category_id)->get() as $third)
                                            @foreach($third->group as $group)
                                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                                    <div class="product_item">
                                                        <p><a href="{{url('/product/'.$group->group_id)}}"
                                                              class="product_name">{{$group->group_name}}</a></p>
                                                        <div class="product-image">
                                                            <a href="{{url('/product/'.$group->group_id)}}"><img
                                                                    src="{{asset('upload/group/'.$group->image)}}"
                                                                    alt="" class=""></a>
                                                        </div>
                                                        <p><span class='price text-right'>
                                            {{$group->product->first()->price}} VND
                                        </span>

                                                        </p>

                                                        <a href="{{url('/product/'.$group->group_id)}}">
                                                            <button class='btn btn-info'><span
                                                                    class="glyphicon glyphicon-shopping-cart"
                                                                    aria-hidden="true"></span> Xem chi tiết
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>

                                            @endforeach

                                        @endforeach
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@endsection
