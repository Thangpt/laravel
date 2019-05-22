@extends('master')

@section('title','đây là trang chủ')

@section('content')

    <p> Đây là phần content </p>
    @foreach($product as $item)
        <p>{{$item->product_name}}</p>
        <image src="{{$item->product_image}}" />
    @endforeach

@endsection
