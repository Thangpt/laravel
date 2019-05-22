@extends('adminhtml.adminlayout')
@section('navigation')

    <li><a href="{{route('dashboard')}}">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active"><a style="text-decoration:none;" href="{{route('product_group')}}">Product Group</a></li>
    <li>Edit Group Product</li>
@endsection
@section('Title')
    <h1 class="page-header">Edit Group Product</h1>
@endsection

@section('content')
    @if($errors->all())
        <div class="alert alert-danger" role="alert">
            Please fill correctly input!
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">Product Group Information</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form style="width:80%;margin:0 auto;" class="form-horizontal" role="form" method="POST"
                          enctype="multipart/form-data"
                          action="{{ url('admin/group/add') }}">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <p>Group Name</p>
                            <input type="text" name="group_name" value="{{$group->group_name}}" class="form-control"/>
                            <input type="hidden" name="group_id" value="{{$group->group_id}}"/>
                        </div>
                        <div class="form-group">
                            <p>Image</p>
                            <input type="file" class="form-control-file" value="{{$group->image}}"
                                   id="exampleFormControlFile1" name="group_image[]">

                        </div>
                        <div class="form-group">
                            <p>Category</p>
                            <select name="product_category" class="form-control">

                                @foreach($category as $item)
                                    @if($item->category_id==$group->product_category)
                                        <option selected
                                                value="{{$item->category_id}}">{{$item->category_name}}</option>
                                    @elseif($item->level ==2)
                                        <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <p> Description</p>
                            <input type="text" value="{{$group->description}}" name="description" class="form-control"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
