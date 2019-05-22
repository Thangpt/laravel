@extends('adminhtml.adminlayout')

@section('navigation')

    <li><a href="{{route('dashboard')}}">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active"><a href="{{route('category')}}">Category</a></li>
    <li>Add Category</li>
@endsection
@section('Title')
    <h1 class="page-header">Add Category</h1>
@endsection

@section('content')
    @if($errors->all())
        <div class="alert alert-danger" role="alert">
            Make sure your information correctly!
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">Category Information</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form style="width:80%;margin:0 auto;" class="form-horizontal" role="form" method="POST"
                          action="{{ url('admin/category/add') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <p>Category Name</p>
                            <input type="text" name="category_name" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <p>Category Parent</p>
                            <select name="category_parent" class="form-control">
                                <option selected>Choose Category parent..</option>
                                <option value="0">Không</option>
                                @foreach($category as $item)
                                    @if($item->level==1)
                                    <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
