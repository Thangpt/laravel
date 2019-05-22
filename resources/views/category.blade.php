@extends('master')

@section('title','đây là trang chủ')

@section('content')

    <p> Đây là phần content </p>
    @foreach($category as $item)
        <p>Category Name: {{$item->category_name}}</p>
        {{--{{$temp=$item->Group}}--}}
        @foreach($item->Group as $group)
            <p>Group Name: {{$group->group_name}}</p>
            @foreach($group->Product as $product)
                <p>Product Name: {{$product->product_name}}</p>
                @endforeach
            @endforeach
    @endforeach

@endsection
