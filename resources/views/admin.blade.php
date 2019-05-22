@extends('adminhtml.adminlayout')

@section('navigation')

    <li><a href="dashboard">
    <svg class="glyph stroked home">
    <use xlink:href="#stroked-home"></use>
    </svg>
    </a></li>
    <li class="active">DashBoard</li>
    @endsection


@section('Title')
    <h1 class="page-header">Dashboard</h1>
    @endsection


@section('content')
<h2 style="text-align:center">
    Welcome to Administrator's Page!
</h2>

@endsection
