@extends('adminhtml.adminlayout')
@section('navigation')

    <li><a href="{{route('dashboard')}}">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active"><a style="text-decoration:none;" href="{{route('user')}}">Users</a></li>
    <li>Edit User</li>
@endsection
@section('Title')
    <h1 class="page-header">Edit User</h1>
@endsection

@section('content')
    @if($errors->all())
        <div class="alert alert-danger" role="alert">
            Please fill correctly input!
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">User Information</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form style="width:80%;margin:0 auto;" class="form-horizontal" role="form" method="POST"
                          action="{{ url('admin/city/add') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <p> Name</p>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control"/>
                            <input type="hidden" name="user_id" value="{{$user->id}}"/>

                        </div>
                        <div class="form-group">
                            <p>User Name</p>
                            <input type="text" value="{{$user->username}}" name="user_name" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <p>Email</p>
                            <input type="text" value="{{$user->email}}" name="email" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <p> PassWord</p>
                            <input id="password" type="password" name="password" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <p> Confirm PassWord</p>
                            <input id="confirm_password" type="password" name="confirm_password" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <p> Level</p>
                            <select name="level">
                                <option>Choose..</option>
                                @if($user->level==0)
                                    <option selected value="0">User</option>
                                    <option value="2">Admin</option>
                                @else
                                    <option value="0">User</option>
                                    <option selected value="2">Admin</option>

                                @endif
                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var password = document.getElementById("password")
            , confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
@endsection
