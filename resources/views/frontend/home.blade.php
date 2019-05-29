@extends('layouts.site')
@section('content')

    <div class="clearpadding" style="margin:0">
        <div class="row">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img style="width: 100%" src="{{asset('upload/banner1.jpg')}}" alt="...">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img style="width: 100%" src="{{asset('upload/banner2.jpg')}}" alt="...">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img style="width: 100%" src="{{asset('upload/banner3.jpg')}}" alt="...">
                        <div class="carousel-caption">
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title text-center"><img src="{{asset('upload/icon/new.gif')}}" alt=""><a href=""
                                                                                                              class='product_title'>Sản
                            phẩm mới </a><img src="{{asset('upload/icon/new.gif')}}" alt=""></h3>
                </div>
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="product_item">
                                <p><a href="" class="product_name">Áo sơ mi</a></p>
                                <div class="product-image">
                                    <a href=""><img src="{{asset('upload/product1.jpg')}}" alt="" class=""></a>
                                </div>
                                <p><span class='price text-right'>200.000 VNĐ</span>
                                    <del class="product-discount">250.000 VNĐ</del>
                                </p>

                                <a href="">
                                    <button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart"
                                                                       aria-hidden="true"></span> Xem chi tiết
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="product_item">
                                <p><a href="" class="product_name">Áo sơ mi</a></p>
                                <div class="product-image">
                                    <a href=""><img src="{{asset('upload/product/somi.png')}}" alt="" class=""></a>
                                </div>
                                <p><span class='price text-right'>200.000 VNĐ</span>
                                    <del class="product-discount">250.000 VNĐ</del>
                                </p>
                                <a href="">
                                    <button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart"
                                                                       aria-hidden="true"></span> Xem chi tiết
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="product_item">
                                <p><a href="" class="product_name">Áo sơ mi</a></p>
                                <div class="product-image">
                                    <a href=""><img src="{{asset('upload/product/somi.png')}}" alt="" class=""></a>
                                </div>
                                <p><span class='price text-right'>200.000 VNĐ</span>
                                    <del class="product-discount">250.000 VNĐ</del>
                                </p>
                                <a href="">
                                    <button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart"
                                                                       aria-hidden="true"></span> Xem chi tiết
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="product_item">
                                <p><a href="" class="product_name">Áo sơ mi</a></p>
                                <div class="product-image">
                                    <a href=""><img src="{{asset('upload/product/somi.png')}}" alt="" class=""></a>
                                </div>
                                <p><span class='price text-right'>200.000 VNĐ</span>
                                    <del class="product-discount">250.000 VNĐ</del>
                                </p>
                                <a href="">
                                    <button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart"
                                                                       aria-hidden="true"></span> Xem chi tiết
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title text-center"><img src="{{asset('upload/icon/hot.gif')}}" alt=""><a href=""
                                                                                                              class='product_title'>Thời trang Nam</a><img src="{{asset('upload/icon/hot.gif')}}" alt=""></h3>
                </div>
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="product_item">
                                <p><a href="" class="product_name">Áo sơ mi</a></p>
                                <div class="product-image">
                                    <a href=""><img src="{{asset('upload/product3.jpg')}}" alt="" class=""></a>
                                </div>
                                <p><span class='price text-right'>200.000 VNĐ</span>
                                    <del class="product-discount">250.000 VNĐ</del>
                                </p>
                                <a href="">
                                    <button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart"
                                                                       aria-hidden="true"></span> Xem chi tiết
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="product_item">
                                <p><a href="" class="product_name">Áo sơ mi</a></p>
                                <div class="product-image">
                                    <a href=""><img src="{{asset('upload/product/somi.png')}}" alt="" class=""></a>
                                </div>
                                <p><span class='price text-right'>200.000 VNĐ</span>
                                    <del class="product-discount">250.000 VNĐ</del>
                                </p>
                                <a href="">
                                    <button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart"
                                                                       aria-hidden="true"></span> Xem chi tiết
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="product_item">
                                <p><a href="" class="product_name">Áo sơ mi</a></p>
                                <div class="product-image">
                                    <a href=""><img src="{{asset('upload/product/somi.png')}}" alt="" class=""></a>
                                </div>
                                <p><span class='price text-right'>200.000 VNĐ</span>
                                    <del class="product-discount">250.000 VNĐ</del>
                                </p>
                                <a href="">
                                    <button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart"
                                                                       aria-hidden="true"></span> Xem chi tiết
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="product_item">
                                <p><a href="" class="product_name">Áo sơ mi</a></p>
                                <div class="product-image">
                                    <a href=""><img src="{{asset('upload/product/somi.png')}}" alt="" class=""></a>
                                </div>
                                <p><span class='price text-right'>200.000 VNĐ</span>
                                    <del class="product-discount">250.000 VNĐ</del>
                                </p>
                                <a href="">
                                    <button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart"
                                                                       aria-hidden="true"></span> Xem chi tiết
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title text-center"><img src="{{asset('upload/icon/hot.gif')}}" alt=""><a href=""
                                                                                                              class='product_title'>Thời trang Nữ</a><img src="{{asset('upload/icon/hot.gif')}}" alt=""></h3>
                </div>
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="product_item">
                                <p><a href="" class="product_name">Áo sơ mi</a></p>
                                <div class="product-image">
                                    <a href=""><img src="{{asset('upload/product2.jpg')}}" alt="" class=""></a>
                                </div>
                                <p><span class='price text-right'>200.000 VNĐ</span>
                                    <del class="product-discount">250.000 VNĐ</del>
                                </p>
                                <a href="">
                                    <button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart"
                                                                       aria-hidden="true"></span> Xem chi tiết
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="product_item">
                                <p><a href="" class="product_name">Áo sơ mi</a></p>
                                <div class="product-image">
                                    <a href=""><img src="{{asset('upload/product/somi.png')}}" alt="" class=""></a>
                                </div>
                                <p><span class='price text-right'>200.000 VNĐ</span>
                                    <del class="product-discount">250.000 VNĐ</del>
                                </p>
                                <a href="">
                                    <button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart"
                                                                       aria-hidden="true"></span> Xem chi tiết
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="product_item">
                                <p><a href="" class="product_name">Áo sơ mi</a></p>
                                <div class="product-image">
                                    <a href=""><img src="{{asset('upload/product/somi.png')}}" alt="" class=""></a>
                                </div>
                                <p><span class='price text-right'>200.000 VNĐ</span>
                                    <del class="product-discount">250.000 VNĐ</del>
                                </p>
                                <a href="">
                                    <button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart"
                                                                       aria-hidden="true"></span> Xem chi tiết
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="product_item">
                                <p><a href="" class="product_name">Áo sơ mi</a></p>
                                <div class="product-image">
                                    <a href=""><img src="{{asset('upload/product/somi.png')}}" alt="" class=""></a>
                                </div>
                                <p><span class='price text-right'>200.000 VNĐ</span>
                                    <del class="product-discount">250.000 VNĐ</del>
                                </p>
                                <a href="">
                                    <button class='btn btn-info'><span class="glyphicon glyphicon-shopping-cart"
                                                                       aria-hidden="true"></span> Xem chi tiết
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
