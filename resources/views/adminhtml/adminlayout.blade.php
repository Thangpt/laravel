<!DOCTYPE html>
<html>
<head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="{{ asset('css/admin/js/lumino.glyphs.js')}}"></script>

    <!-- Fonts -->
    {{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/css/styles.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"--}}
    {{--integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
    <style>
        tr th {
            text-align: center;
        }

    </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

</head>
{{--<body>--}}
{{--<div class="header">--}}
{{--<ul>--}}
{{--<li>--}}
{{--<button type="button" class="btn btn-outline-warning"><a href="#">Home Page </a></button>--}}
{{--</li>--}}
{{--<li>--}}
{{--<button type="button" class="btn btn-outline-warning"><a href="#">Admin Page </a></button>--}}
{{--</li>--}}
{{--@if(!Auth::check())--}}
{{--<li>--}}
{{--<button type="button" class="btn btn-outline-warning"><a--}}
{{--href="{{ route('login') }}">{{ __('Login') }}</a></button>--}}
{{--</li>--}}
{{--<li>--}}
{{--<button type="button" class="btn btn-outline-warning"><a--}}
{{--href="{{ route('register') }}">{{ __('Register') }}</a></button>--}}
{{--</li>--}}
{{--@elseif(Auth::user()->level<1)--}}
{{--<li>--}}
{{--<button type="button" class="btn btn-outline-warning"><a href="">{{ Auth::user()->name }} </a></button>--}}
{{--<div class="btn-group" role="group">--}}
{{--<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle"--}}
{{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--{{ Auth::user()->name }}--}}
{{--</button>--}}
{{--<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">--}}
{{--<a class="dropdown-item" href="#">My Account</a>--}}
{{--<a class="dropdown-item" href="#">My Orders</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</li>--}}
{{--<li>--}}
{{--<button type="button" class="btn btn-outline-warning"><a href="{{ route('logout') }}"--}}
{{--onclick="event.preventDefault();--}}
{{--document.getElementById('logout-form').submit();">--}}
{{--{{ __('Logout') }}</a></button>--}}
{{--<form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--style="display: none;">--}}
{{--@csrf--}}
{{--</form>--}}
{{--</li>--}}
{{--@else--}}
{{--<li>--}}
{{--<button type="button" class="btn btn-outline-warning"><a href="">{{ Auth::user()->name }} </a></button>--}}
{{--<div class="btn-group" role="group">--}}
{{--<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle"--}}
{{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--{{ Auth::user()->name }}--}}
{{--</button>--}}
{{--<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">--}}
{{--<a class="dropdown-item" href="#">My Account</a>--}}
{{--<a class="dropdown-item" href="#">My Orders</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</li>--}}
{{--<li>--}}
{{--<button type="button" class="btn btn-outline-warning"><a href="{{ route('logout') }}"--}}
{{--onclick="event.preventDefault();--}}
{{--document.getElementById('logout-form').submit();">--}}
{{--{{ __('Logout') }}</a></button>--}}
{{--<form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--style="display: none;">--}}
{{--@csrf--}}
{{--</form>--}}
{{--</li>--}}
{{--@endif--}}
{{--</ul>--}}
{{--</div>--}}
{{--<div class="content">--}}
{{--<div class="row">--}}
{{--<div class="col-xs-3 col-md-3 col-sm-3 col-lg-3 col-xl-3">--}}
{{--<div class="admin_menu">--}}
{{--<div class="admin_menu_title">--}}
{{--<p><i>Awesome Clothes</i></p>--}}
{{--</div>--}}
{{--<div class="admin_menu_item">--}}
{{--<a href="#">Link to another page</a>--}}
{{--</div>--}}
{{--<div class="admin_menu_item">--}}
{{--<a href="#">Link to another page</a>--}}
{{--</div>--}}
{{--<div class="admin_menu_item">--}}
{{--<a href="#">Link to another page</a>--}}
{{--</div>--}}
{{--<div class="admin_menu_item">--}}
{{--<a href="#">Link to another page</a>--}}
{{--</div>--}}
{{--<div class="admin_menu_item">--}}
{{--<a href="#">Link to another page</a>--}}
{{--</div>--}}
{{--<div class="admin_menu_item">--}}
{{--<a href="#">Link to another page</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-xs-9 col-md-9 col-sm-9 col-lg-9 col-xl-9">--}}
{{--<div class="admin_content">--}}
{{--@yield('content')--}}
{{--</div>--}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}

{{--</body>--}}
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"--}}
            {{--data-target="#sidebar-collapse">--}}
            {{--<span class="sr-only">Toggle navigation</span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--</button>--}}
            <a class="navbar-brand" href="{{route('dashboard')}}"><span>Manage</span>Admin</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <svg class="glyph stroked male-user">
                            <use xlink:href="#stroked-male-user"></use>
                        </svg>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            {{\Illuminate\Support\Facades\Auth::user()->name}}
                        @endif
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">
                                <svg class="glyph stroked male-user">
                                    <use xlink:href="#stroked-male-user"></use>
                                </svg>
                                Profile</a></li>
                        <li><a href="#">
                                <svg class="glyph stroked gear">
                                    <use xlink:href="#stroked-gear"></use>
                                </svg>
                                Settings</a></li>
                        {{--<li><a href="#">--}}
                        {{--<svg class="glyph stroked cancel">--}}
                        {{--<use xlink:href="#stroked-cancel"></use>--}}
                        {{--</svg>--}}
                        {{--Logout</a></li>--}}
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <svg class="glyph stroked cancel">
                                    <use xlink:href="#stroked-cancel"></use>
                                </svg>{{__('Logout')}}
                            </a>

                        </li>

                    </ul>
                </li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                @csrf
            </form>
        </div>

    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search" action="{{url('admin/search')}}" method="GET">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu" style="display:block">
        <li class="active"><a href="{{route('dashboard')}}">
                <svg class="glyph stroked dashboard-dial">
                    <use xlink:href="#stroked-dashboard-dial"></use>
                </svg>
                Dashboard</a></li>
        <li><a href="{{route('user')}}">
                <svg class="glyph stroked male user ">
                    <use xlink:href="#stroked-male-user"/>
                </svg>
                Users</a></li>
        <li><a href="{{route('repository')}}">
                <svg class="glyph stroked table">
                    <use xlink:href="#stroked-table"/>
                </svg>
                Repository</a></li>
        <li><a href="{{route('order')}}">
                <svg class="glyph stroked clipboard with paper">
                    <use xlink:href="#stroked-clipboard-with-paper"/>
                </svg>
                Orders
            </a></li>
        <li><a href="{{route('category')}}">
                <svg class="glyph stroked tag">
                    <use xlink:href="#stroked-tag"/>
                </svg>
                Category
            </a></li>
        <li><a href="{{route('product_group')}}">
                <svg class="glyph stroked notepad ">
                    <use xlink:href="#stroked-notepad"/>
                </svg>
                Product Groups</a></li>
        <li><a href="{{route('product')}}">
                <svg class="glyph stroked app-window">
                    <use xlink:href="#stroked-app-window"></use>
                </svg>
                Products</a></li>
        <li><a href="{{route('product_repository')}}">
                <svg class="glyph stroked table">
                    <use xlink:href="#stroked-table"/>
                </svg>
                Product Repository</a></li>
        <li class="parent ">
            <a href="#">
                <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use
                            xlink:href="#stroked-chevron-down"></use></svg></span> Settings
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a class="" href="{{route('profile')}}">
                        <svg class="glyph stroked chevron-right">
                            <use xlink:href="#stroked-chevron-right"></use>
                        </svg>
                        Profile
                    </a>
                </li>
                <li>
                    <a class="" href="{{route('shipping')}}">
                        <svg class="glyph stroked chevron-right">
                            <use xlink:href="#stroked-chevron-right"></use>
                        </svg>
                        Shipping
                    </a>
                </li>
                <li>
                    <a class="" href="#">
                        <svg class="glyph stroked chevron-right">
                            <use xlink:href="#stroked-chevron-right"></use>
                        </svg>
                        Sub Item 3
                    </a>
                </li>
            </ul>
        </li>
        <li role="presentation" class="divider"></li>
        <li><a href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <svg class="glyph stroked cancel">
                    <use xlink:href="#stroked-cancel"></use>
                </svg>{{__('Logout')}}
            </a>

        </li>
    </ul>

</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div style="padding:15px">
            <ol class="breadcrumb">
                {{--<li><a href="#">--}}
                {{--<svg class="glyph stroked home">--}}
                {{--<use xlink:href="#stroked-home"></use>--}}
                {{--</svg>--}}
                {{--</a></li>--}}
                {{--<li class="active">Icons</li>--}}
                @yield('navigation')
            </ol>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            {{--<h1 class="page-header">Dashboard</h1>--}}
            @yield('Title')
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-blue panel-widget ">
                <a href="{{route('new_order')}}" style="text-decoration:none">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked bag">
                                <use xlink:href="#stroked-bag"></use>
                            </svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{$variable[0]}}</div>
                            <div class="text-muted">New Orders</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-orange panel-widget" style="cursor:pointer">
                <a href="{{route('product')}}" style="text-decoration:none">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked app-window">
                                <use xlink:href="#stroked-app-window"></use>
                            </svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{$variable[1]}}</div>
                            <div class="text-muted">Products</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-teal panel-widget" style="cursor:pointer">
                <a href="{{route('user')}}" style="text-decoration:none">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked male-user">
                                <use xlink:href="#stroked-male-user"></use>
                            </svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{$variable[2]}}</div>
                            <div class="text-muted">Users</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-blue panel-widget ">
                <a href="{{route('order')}}" style="text-decoration:none">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked bag">
                                <use xlink:href="#stroked-bag"></use>
                            </svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{$variable[3]}}</div>
                            <div class="text-muted">Orders</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div><!--/.row-->
    {{--<div class="row">--}}
    {{--<div class="col-lg-12">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading">Advanced Table</div>--}}
    {{--<div class="panel-body">--}}
    {{--<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th data-field="state" data-checkbox="true" >Item ID</th>--}}
    {{--<th data-field="id" data-sortable="true">Item ID</th>--}}
    {{--<th data-field="name"  data-sortable="true">Item Name</th>--}}
    {{--<th data-field="price" data-sortable="true">Item Price</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div><!--/.row-->--}}
    <div>
        @yield('content');
    </div>


</div>    <!--/.main-->

<script src="{{ asset('css/admin/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{ asset('css/admin/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('css/admin/js/chart.min.js')}}"></script>
<script src="{{ asset('css/admin/js/chart-data.js')}}"></script>
<script src="{{ asset('css/admin/js/easypiechart.js')}}"></script>
<script src="{{ asset('css/admin/js/easypiechart-data.js')}}"></script>
<script src="{{ asset('css/admin/js/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('css/admin/js/bootstrap-table.js')}}"></script>
<script>
    $('#calendar').datepicker({});

    !function ($) {
        $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
</body>

</html>
