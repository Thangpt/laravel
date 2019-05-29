@extends('layouts/site')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 clearpaddingr">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">

                    <ol class="breadcrumb">
                        <li><a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Trang chủ</a>
                        </li>
                        <li><a href="#">Sản phẩm</a></li>
                        <li class="active">Áo sơ mi</li>
                    </ol>
                    <div class="panel panel-info " style="margin-bottom: 15px">
                        <div class="panel-heading">
                            <h3 class="panel-title">Xem chi tiết sản phẩm</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center">
                                <a href="../upload/product/somi.jpg" class="jqzoom" rel="gal1" title="triumph">
                                    <img src="{{asset('/upload/product1.jpg')}}" alt="" style="width:100%">
                                </a>
                                <ul id="thumblist">
                                    <li>
                                        <a class="zoomThumbActive" href="javascript:void(0);"
                                           rel="{gallery: 'gal1', smallimage: '../upload/product/somi.png',largeimage: '../upload/product/somi.png'}">
                                            <img src="{{asset('/upload/product1.jpg')}}">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <h1 style="font-size: 25px;text-transform:uppercase;color: red;font-weight:bold;">Áo
                                    sơ
                                    mi</h1>
                                <p>Nội dung giới thiệu</p>
                                <p>Giá cũ: <strong>
                                        <del>250.000 VNĐ</del>
                                    </strong></p>
                                <p>Giá khuyến mại: <span style="font-weight: bold;color: green">200.000 VNĐ</span>
                                </p>
                                <p>Số lượt xem: 450</p>
                                <a href="" class="btn btn-info" data-toggle="modal"
                                   data-target="#addToCart"> Thêm vào giỏ hàng</a>
                            </div>
                            {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">--}}
                                {{--<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">--}}
                                    {{--<img src="../upload/icon/services.png" alt="">--}}
                                    {{--<p style="color:red">Phục vụ chu đáo</p>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">--}}
                                    {{--<img src="../upload/icon/ship.png" alt="">--}}
                                    {{--<p style="color:red">Trao hàng đúng hẹn</p>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">--}}
                                    {{--<img src="../upload/icon/services.png" alt="">--}}
                                    {{--<p style="color:red">Đổi hàng trong 24h</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div style="margin-top: 250px;" class="modal fade" id="addToCart" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                                            <h4 class="modal-title">Add to Cart</h4>
                                        </div>
                                        <div style="padding:15px;margin-left:20px;margin-right: 20px;" >
                                            <form method="POST" action="" class="form-horizontal" role="form">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <p>Choose a product</p>
                                                    <select class="form-control" name="product">
                                                        <option value="1">Red-M</option>
                                                        <option value="1">Red-L</option>
                                                        <option value="1">Red-XL</option>
                                                        <option value="1">Blue-M</option>
                                                        <option value="1">Green-M</option>
                                                        <option value="1">Blue-L</option>
                                                        <option value="1">Green-L</option>
                                                        <option value="1">Blue-XL</option>
                                                        <option value="1">Green-XL</option>

                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <p>Choose quantity</p>
                                                    <input class="form-control" type="text" />
                                                </div>
                                                <button class="btn btn-primary" type="submit"> Add</button>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--<div class="panel panel-info">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<h3 class="panel-title">Sản phẩm liên quan</h3>--}}
                        {{--</div>--}}
                        {{--<div class="panel-body">--}}
                            {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">--}}
                                {{--<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 re-padding">--}}
                                    {{--<div class="product_item">--}}
                                        {{--<p><a href="" class="product_name">Áo sơ mi</a></p>--}}
                                        {{--<div class="product-image">--}}
                                            {{--<a href=""><img src="../upload/product/somi.png" alt="" class=""></a>--}}
                                        {{--</div>--}}
                                        {{--<p><span class='price text-right'>200.000 VNĐ</span>--}}
                                            {{--<del class="product-discount">250.000 VNĐ</del>--}}
                                        {{--</p>--}}
                                        {{--<p><span class="glyphicon glyphicon-eye-open" aria-hidden="true"--}}
                                                 {{--title="Số lượt xem"></span> 190 <span--}}
                                                {{--class="glyphicon glyphicon-star-empty" aria-hidden="true"--}}
                                                {{--title="Số lượng đặt mua">9</p>--}}
                                        {{--<a href="">--}}
                                            {{--<button class='btn btn-info'><span--}}
                                                    {{--class="glyphicon glyphicon-shopping-cart"--}}
                                                    {{--aria-hidden="true"></span> Thêm giỏ hàng--}}
                                            {{--</button>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 re-padding">--}}
                                    {{--<div class="product_item">--}}
                                        {{--<p><a href="" class="product_name">Áo sơ mi</a></p>--}}
                                        {{--<div class="product-image">--}}
                                            {{--<a href=""><img src="../upload/product/somi.png" alt="" class=""></a>--}}
                                        {{--</div>--}}
                                        {{--<p><span class='price text-right'>200.000 VNĐ</span>--}}
                                            {{--<del class="product-discount">250.000 VNĐ</del>--}}
                                        {{--</p>--}}
                                        {{--<p><span class="glyphicon glyphicon-eye-open" aria-hidden="true"--}}
                                                 {{--title="Số lượt xem"></span> 190 <span--}}
                                                {{--class="glyphicon glyphicon-star-empty" aria-hidden="true"--}}
                                                {{--title="Số lượng đặt mua">9</p>--}}
                                        {{--<a href="">--}}
                                            {{--<button class='btn btn-info'><span--}}
                                                    {{--class="glyphicon glyphicon-shopping-cart"--}}
                                                    {{--aria-hidden="true"></span> Thêm giỏ hàng--}}
                                            {{--</button>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 re-padding">--}}
                                    {{--<div class="product_item">--}}
                                        {{--<p><a href="" class="product_name">Áo sơ mi</a></p>--}}
                                        {{--<div class="product-image">--}}
                                            {{--<a href=""><img src="../upload/product/somi.png" alt="" class=""></a>--}}
                                        {{--</div>--}}
                                        {{--<p><span class='price text-right'>200.000 VNĐ</span>--}}
                                            {{--<del class="product-discount">250.000 VNĐ</del>--}}
                                        {{--</p>--}}
                                        {{--<p><span class="glyphicon glyphicon-eye-open" aria-hidden="true"--}}
                                                 {{--title="Số lượt xem"></span> 190 <span--}}
                                                {{--class="glyphicon glyphicon-star-empty" aria-hidden="true"--}}
                                                {{--title="Số lượng đặt mua">9</p>--}}
                                        {{--<a href="">--}}
                                            {{--<button class='btn btn-info'><span--}}
                                                    {{--class="glyphicon glyphicon-shopping-cart"--}}
                                                    {{--aria-hidden="true"></span> Thêm giỏ hàng--}}
                                            {{--</button>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 re-padding">--}}
                                    {{--<div class="product_item">--}}
                                        {{--<p><a href="" class="product_name">Áo sơ mi</a></p>--}}
                                        {{--<div class="product-image">--}}
                                            {{--<a href=""><img src="../upload/product/somi.png" alt="" class=""></a>--}}
                                        {{--</div>--}}
                                        {{--<p><span class='price text-right'>200.000 VNĐ</span>--}}
                                            {{--<del class="product-discount">250.000 VNĐ</del>--}}
                                        {{--</p>--}}
                                        {{--<p><span class="glyphicon glyphicon-eye-open" aria-hidden="true"--}}
                                                 {{--title="Số lượt xem"></span> 190 <span--}}
                                                {{--class="glyphicon glyphicon-star-empty" aria-hidden="true"--}}
                                                {{--title="Số lượng đặt mua">9</p>--}}
                                        {{--<a href="">--}}
                                            {{--<button class='btn btn-info'><span--}}
                                                    {{--class="glyphicon glyphicon-shopping-cart"--}}
                                                    {{--aria-hidden="true"></span> Thêm giỏ hàng--}}
                                            {{--</button>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="panel panel-info">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<h3 class="panel-title">Có thể bạn thích</h3>--}}
                        {{--</div>--}}
                        {{--<div class="panel-body">--}}
                            {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">--}}
                                {{--<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 re-padding">--}}
                                    {{--<div class="product_item">--}}
                                        {{--<p><a href="" class="product_name">Áo sơ mi</a></p>--}}
                                        {{--<div class="product-image">--}}
                                            {{--<a href=""><img src="../upload/product/somi.png" alt="" class=""></a>--}}
                                        {{--</div>--}}
                                        {{--<p><span class='price text-right'>200.000 VNĐ</span>--}}
                                            {{--<del class="product-discount">250.000 VNĐ</del>--}}
                                        {{--</p>--}}
                                        {{--<p><span class="glyphicon glyphicon-eye-open" aria-hidden="true"--}}
                                                 {{--title="Số lượt xem"></span> 190 <span--}}
                                                {{--class="glyphicon glyphicon-star-empty" aria-hidden="true"--}}
                                                {{--title="Số lượng đặt mua">9</p>--}}
                                        {{--<a href="">--}}
                                            {{--<button class='btn btn-info'><span--}}
                                                    {{--class="glyphicon glyphicon-shopping-cart"--}}
                                                    {{--aria-hidden="true"></span> Thêm giỏ hàng--}}
                                            {{--</button>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 re-padding">--}}
                                    {{--<div class="product_item">--}}
                                        {{--<p><a href="" class="product_name">Áo sơ mi</a></p>--}}
                                        {{--<div class="product-image">--}}
                                            {{--<a href=""><img src="../upload/product/somi.png" alt="" class=""></a>--}}
                                        {{--</div>--}}
                                        {{--<p><span class='price text-right'>200.000 VNĐ</span>--}}
                                            {{--<del class="product-discount">250.000 VNĐ</del>--}}
                                        {{--</p>--}}
                                        {{--<p><span class="glyphicon glyphicon-eye-open" aria-hidden="true"--}}
                                                 {{--title="Số lượt xem"></span> 190 <span--}}
                                                {{--class="glyphicon glyphicon-star-empty" aria-hidden="true"--}}
                                                {{--title="Số lượng đặt mua">9</p>--}}
                                        {{--<a href="">--}}
                                            {{--<button class='btn btn-info'><span--}}
                                                    {{--class="glyphicon glyphicon-shopping-cart"--}}
                                                    {{--aria-hidden="true"></span> Thêm giỏ hàng--}}
                                            {{--</button>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 re-padding">--}}
                                    {{--<div class="product_item">--}}
                                        {{--<p><a href="" class="product_name">Áo sơ mi</a></p>--}}
                                        {{--<div class="product-image">--}}
                                            {{--<a href=""><img src="../upload/product/somi.png" alt="" class=""></a>--}}
                                        {{--</div>--}}
                                        {{--<p><span class='price text-right'>200.000 VNĐ</span>--}}
                                            {{--<del class="product-discount">250.000 VNĐ</del>--}}
                                        {{--</p>--}}
                                        {{--<p><span class="glyphicon glyphicon-eye-open" aria-hidden="true"--}}
                                                 {{--title="Số lượt xem"></span> 190 <span--}}
                                                {{--class="glyphicon glyphicon-star-empty" aria-hidden="true"--}}
                                                {{--title="Số lượng đặt mua">9</p>--}}
                                        {{--<a href="">--}}
                                            {{--<button class='btn btn-info'><span--}}
                                                    {{--class="glyphicon glyphicon-shopping-cart"--}}
                                                    {{--aria-hidden="true"></span> Thêm giỏ hàng--}}
                                            {{--</button>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 re-padding">--}}
                                    {{--<div class="product_item">--}}
                                        {{--<p><a href="" class="product_name">Áo sơ mi</a></p>--}}
                                        {{--<div class="product-image">--}}
                                            {{--<a href=""><img src="../upload/product/somi.png" alt="" class=""></a>--}}
                                        {{--</div>--}}
                                        {{--<p><span class='price text-right'>200.000 VNĐ</span>--}}
                                            {{--<del class="product-discount">250.000 VNĐ</del>--}}
                                        {{--</p>--}}
                                        {{--<p><span class="glyphicon glyphicon-eye-open" aria-hidden="true"--}}
                                                 {{--title="Số lượt xem"></span> 190 <span--}}
                                                {{--class="glyphicon glyphicon-star-empty" aria-hidden="true"--}}
                                                {{--title="Số lượng đặt mua">9</p>--}}
                                        {{--<a href="">--}}
                                            {{--<button class='btn btn-info'><span--}}
                                                    {{--class="glyphicon glyphicon-shopping-cart"--}}
                                                    {{--aria-hidden="true"></span> Thêm giỏ hàng--}}
                                            {{--</button>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
@endsection
