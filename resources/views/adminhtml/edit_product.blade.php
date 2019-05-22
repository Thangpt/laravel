@extends('adminhtml.adminlayout')
@section('content')
    @if($errors->all())
        <div class="alert alert-danger" role="alert">
            A simple danger alert—check it out!
        </div>
    @endif
    <form style="width:80%;margin:0 auto;" class="form-horizontal" role="form" method="POST"
          enctype="multipart/form-data"
          action="{{ url('admin/product/edit') }}">
        {{ csrf_field() }}
        @foreach($products as $product)
            <p class="form-control">Product Information</p>
            <div class="form-group">
                <p>Product Name</p>

                <input type="text" value="{{$product->product_name}}" name="product_name" class="form-control"/>
                <input type="hidden" value="{{$product->product_id}}" name="product_id" />
            </div>
            <div class="form-group">
                <p>Image</p>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="product_image[]" value="{{asset('/upload/product/'.$product->image)}}">

            </div>
            <div class="form-group">
                <p>Product Group</p>
                <select name="product_group" class="form-control">

                    @foreach($groups as $item)
                        @if($product->product_group == $item->group_id)
                            <option selected value="{{$item->group_id}}">{{$item->group_name}}</option>
                        @else
                            <option value="{{$item->group_id}}">{{$item->group_name}}</option>
                        @endif
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <p>Product Description</p>
                <input type="text" value="{{$product->description}}" name="product_description" class="form-control"/>

            </div>
            <div class="form-group">
                <p>Product Size</p>
                <select name="product_size" class="form-control">

                    @if($product->size==1)
                        <option selected value="1">M</option>
                        <option value="2">L</option>
                        <option value="3">XL</option>
                    @elseif($product->size==2)
                        <option value="1">M</option>
                        <option selected value="2">L</option>
                        <option value="3">XL</option>
                    @else
                        <option value="1">M</option>
                        <option value="2">L</option>
                        <option selected value="3">XL</option>
                    @endif
                </select>

            </div>
            <div class="form-group">
                <p>Color</p>
                <select name="product_color" class="form-control">
                    @if($product->color==1)
                        <option selected value="1">Red</option>
                        <option value="2">Green</option>
                        <option value="3">Blue</option>
                    @elseif($product->color==2)
                        <option value="1">Red</option>
                        <option selected value="2">Green</option>
                        <option value="3">Blue</option>
                    @else
                        <option value="1">Red</option>
                        <option value="2">Green</option>
                        <option selected value="3">Blue</option>
                    @endif
                </select>

            </div>
            <div class="form-group">
                <p>Price</p>
                <input type="text" value="{{$product->price}}" name="product_price" class="form-control"/>

            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        @endforeach
    </form>
@endsection
