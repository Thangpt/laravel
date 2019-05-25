<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Awesome Clothes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="{{asset('css/js/jquery-3.1.1.js')}}" type="text/javascript"></script>
    <script src="{{asset('css/js/jquery.jcarousel.pack.js')}}" type="text/javascript"></script>
    <script src="{{asset('css/js/jquery-func.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/site/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/site/css/style.css')}}">
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('css/admin/css/bootstrap.min.css') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('css/admin/css/datepicker3.css') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('css/admin/css/styles.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
<div class="container">
    <div class="row" style="margin-top: 3px;height: 125px">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 clearpadding">
            <a href="#"><img src="{{asset('upload/logo.png')}}" alt="" class="img-responsive"></a>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 clearpadding">
            <a href="#"><img src="{{asset('upload/banner.jpg')}}" alt="" class="img-responsive"></a>
        </div>
    </div>
    <div class="row">

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">WebSiteName</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Page 1-1</a></li>
                                <li><a href="#">Page 1-2</a></li>
                                <li><a href="#">Page 1-3</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Page 2</a></li>
                        <li><a href="#">Page 3</a></li>

                    </ul>
                    <form class="navbar-form navbar-left" action="/action_page.php">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    @if(!\Illuminate\Support\Facades\Auth::check())
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{route('register')}}"><span class="glyphicon glyphicon-user"></span> Sign
                                    Up</a></li>
                            <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                            </li>
                        </ul>
                    @elseif(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->level==0 && isset($total_cart) )
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><span class="glyphicon glyphicon-shopping-cart" data-toggle="modal"
                                                  data-target="#myModal"></span>
                                    {{--@foreach( $total_cart as $key => $value)--}}
                                    {{--@if( $key == \Illuminate\Support\Facades\Auth::user()->id)--}}
                                    {{--{{$value}}--}}
                                    {{--@endif--}}
                                    {{--@endforeach--}}
                                    {{--{{$total_cart[\Illuminate\Support\Facades\Auth::user()->id]}}--}}
                                    {{--@foreach($total_cart as $item)--}}
                                    {{--{{print_r($item)}}--}}
                                    {{--<br>--}}
                                    {{--@endforeach--}}
                                    {{$total_cart[\Illuminate\Support\Facades\Auth::user()->id]}}


                                </a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <span class="glyphicon glyphicon-user"></span>
                                    {{\Illuminate\Support\Facades\Auth::user()->name}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">My Profile</a></li>
                                    <li><a href="{{url('user/order')}}">My Orders</a></li>
                                    <li><a href="{{url('user/cart')}}">My Cart</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span
                                        class="glyphicon glyphicon-log-out"></span>
                                    {{ __('Logout') }}
                                </a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    @endif
                </div>

            </div>
        </nav>

    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    <h4 class="modal-title">My Cart</h4>
                </div>
                <div class="modal-body">
                    @if($errors->all())
                        <div class="alert alert-danger" role="alert">
                             Wrong quantity value!
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
                        @if(\Illuminate\Support\Facades\Auth::check()&& isset($all_cart))
                            @foreach($all_cart->where('user_id',\Illuminate\Support\Facades\Auth::user()->id) as $item )
                                @if($item->quantity > 0)
                                <div class="row">
                                    <div class="col-xs-3"><img style="width:40px;border-radius: 30%" src="{{asset('upload/product/'.$item->Product->product_image)}}"/></div>
                                    <div class="col-xs-3">{{$item->Product->product_name}}</div>
                                    <div class="col-xs-3"> <input class="form-control" type="text" name="product{{$item->product_id}}" value="{{$item->quantity}}" /></div>
                                    <div class="col-xs-3">{{$item->Product->price}} VND</div>
                                </div>
                                @endif
                            @endforeach
                        @endif

                        <input class="btn btn-primary" style="margin:15px auto;padding:15px" type="submit" name="update" value="Update Cart"/>
                        <input class="btn btn-warning" style="margin:15px auto;padding:15px;float:right" name="buy" type="submit" value="Buy"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"><a href="{{url('user/cart')}}">Details</a></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <div class="row" id="bank">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 no-padding">
                <div class="footer-info">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <a href="" title=""><strong>GIỚI THIỆU CÔNG TY</strong></a>
                        <li><a href="#" title="">Các chính sách</a></li>
                        <li><a href="#" title="">Câu hỏi thường gặp</a></li>
                        <li><a href="#" title="">Hệ thống bảo hành</a></li>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <a href="" title=""><strong>TUYỂN DỤNG</strong></a>
                        <li><a href="#" title="">Tuyển dụng mới nhất</a></li>
                        <li><a href="#" title="">Hưỡng dẫn mua hàng Online</a></li>
                        <li><a href="#" title="">Chính sách mua trả góp</a></li>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <a href="" title=""><strong>HỆ THỐNG CỬA HÀNG</strong></a>
                        <li><a href="#" title="">Kiểm tra hàng chính hãng</a></li>
                        <li><a href="#" title="">Máy đổi trả</a></li>
                        <li><a href="#" title="">Hệ thống cửa hàng</a></li>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <p>Hỗ trợ thanh toán <img src="http://localhost/myshop/public/images/pay.png" alt=""
                                          style="padding-left: 25px;"></p>
                <div class="fi-left pull-left">
                    <p>
                        <small>Tư vẫn miễn phí (24/7)</small>
                    </p>
                    <strong>1800 xxxx</strong>
                </div>
                <div class="fi-right pull-right">
                    <p>
                        <small>Góp ý, phản ánh(8h00 - 22h00)</small>
                    </p>
                    <strong>1800 xxxx</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="footer">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <address>
                    <strong> SHOP thời trang Ngọc Lan</strong><br>
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Địa chỉ: Kỳ Sơn - Thủy Nguyên -
                    Hải Phòng<br>
                    <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> Điện thoại: 01215345336<br>
                    Copyright ©2017 - Design by GoS ---
                </address>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-right">
                <a href="#"><img src="{{asset('upload/icon/facebook.png')}}" alt=""></a>
                <a href="#"><img src="{{asset('upload/icon/twitter.png')}}" alt=""></a>
                <a href="#"><img src="{{asset('upload/icon/google.png')}}" alt=""></a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<script src="{{asset('css/site/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
