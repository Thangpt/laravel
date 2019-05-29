@extends('adminhtml.adminlayout')
@section('navigation')

    <li><a href="{{route('dashboard')}}">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active"><a style="text-decoration:none;" href="{{route('category')}}">Category</a></li>
    <li>Edit Category</li>
@endsection
@section('Title')
    <h1 class="page-header">Edit Category</h1>
@endsection

@section('content')
    @if($errors->all())
        <div class="alert alert-danger" role="alert">
            Please fill correctly input!
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">Category Information</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form style="width:80%;margin:0 auto;" class="form-horizontal" role="form" method="POST"
                          action="{{ url('admin/category/edit') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <p>Category Name</p>
                            <input type="hidden" value="{{$item->category_id}}" name="category_id">
                            <input type="text" name="category_name" value="{{$item->category_name}}"
                                   class="form-control"/>

                        </div>
                        <div class="form-group">
                            <p>Category Parent</p>
                            <select name="category_parent" class="form-control">
                                <option>Choose Category parent..</option>
                                @if($item->category_parent==0)
                                    <option selected value="0">Không</option>
                                    @foreach($category as $model)

                                        @if($model->level==1 && $model->category_id != $item->category_id)
                                            <option value="{{$model->category_id}}">{{$model->category_name}}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="0">Không</option>
                                    @foreach($category as $model)

                                        @if($item->category_parent==$model->category_id && $model->category_id != $item->category_id)
                                            <option selected
                                                    value="{{$model->category_id}}">{{$model->category_name}}</option>
                                        @elseif($model->level < 3)
                                            <option value="{{$model->category_id}}">{{$model->category_name}}</option>
                                        @endif
                                    @endforeach

                                @endif

                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
