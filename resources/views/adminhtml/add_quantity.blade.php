@extends('adminhtml.adminlayout')

@section('navigation')

    <li><a href="{{route('dashboard')}}">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active"><a style="text-decoration:none;" href="{{route('product')}}">Product</a></li>
    <li>Edit Product Quantity</li>
@endsection
@section('Title')
    <h1 class="page-header">Edit Product Quantity</h1>
@endsection

@section('content')
    @if($errors->all())
        <div class="alert alert-danger" role="alert">
            Make sure your information correctly!
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">Edit Quantity for Product {{$product->product_name}}</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form style="width:80%;margin:0 auto;" class="form-horizontal" role="form" method="POST"
                          action="{{ url('admin/product/quantity') }}">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$product->product_id}}" name="product_id"/>


                        @foreach($product_repository as $item)



                            <div class="form-group">
                                <p>{{$item->Reposi->repository_name}}</p>
                                <input type="text" name="repository{{$item->repository_id}}" class="form-control"
                                       value="{{$item->quantity}}"/>
                                <input type="hidden" value="{{$item->repository_id}}"
                                       name="id{{$item->repository_id}}"/>

                            </div>



                        @endforeach


                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
