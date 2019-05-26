@extends('adminhtml.adminlayout')

@section('navigation')

    <li><a href="{{route('dashboard')}}">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active"><a style="text-decoration:none;" href="{{route('product')}}">Product</a></li>
    <li>Add Product</li>
@endsection
@section('Title')
    <h1 class="page-header">Add Product</h1>
@endsection

@section('content')
    @if($errors->all())
        <div class="alert alert-danger" role="alert">
            Please fill correctly input!
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">Product Information</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form style="width:100%;margin:0 auto" class="form-horizontal" role="form" method="POST"
                          enctype="multipart/form-data"
                          action="{{ url('admin/product/add') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <h4>Product Name</h4>
                            <input type="text" name="product_name" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <h4>Image</h4>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                   name="product_image[]">

                        </div>
                        <div class="form-group">
                            <h4>Product Group</h4>
                            <select name="product_group" class="form-control">
                                <option selected>Choose..</option>
                                @foreach($group as $item)
                                    <option value="{{$item->group_id}}">{{$item->group_name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <h4>Product Description</h4>
                            <input type="text" name="product_description" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <h4>Product Size</h4>
                            <select name="product_size" class="form-control">
                                <option selected> Choose a size</option>
                                @foreach($sizes as $size)
                                    <option value="{{$size->id}}">{{$size->size}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <h4>Color</h4>
                            <select name="product_color" class="form-control">
                                <option selected> Choose a color</option>
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->color}}</option>
                                    @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <h4>Price</h4>
                            <input type="text" name="product_price" class="form-control"/>

                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
