@extends('adminhtml.adminlayout')

@section('navigation')

    <li><a href="{{route('dashboard')}}">
            <svg class="glyph stroked home">
                <use xlink:href="#stroked-home"></use>
            </svg>
        </a></li>
    <li class="active">Settings</li>
    <li>Profile</li>
@endsection
@section('Title')
    <h1 class="page-header">My Profile</h1>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            @if(\Illuminate\Support\Facades\Auth::check())
                @if(\Illuminate\Support\Facades\Auth::user())

                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Name</h4>
                                </div>
                                <div class="col-md-8">{{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>User Name</h4>
                                </div>
                                <div class="col-md-8">{{\Illuminate\Support\Facades\Auth::user()->username}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Email</h4>
                                </div>
                                <div class="col-md-8">{{\Illuminate\Support\Facades\Auth::user()->email}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Created at</h4>
                                </div>
                                <div class="col-md-8">{{\Illuminate\Support\Facades\Auth::user()->created_at}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Updated at</h4>
                                </div>
                                <div class="col-md-8">{{\Illuminate\Support\Facades\Auth::user()->updated_at}}</div>
                            </div>
                        </div>
                    </div>

                @endif
            @endif

            <div>
                <button type="button" class="btn btn-primary"><a style="color:black;text-decoration:none"
                                                                 href="profile/edit">Edit</a></button>
                <button type="button" class="btn btn-primary"><a style="color:black;text-decoration:none"
                                                                 href="profile/password">Change PassWord</a></button>
            </div>
        </div>
    </div>
@endsection
