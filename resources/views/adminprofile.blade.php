@extends('layouts.app')



@section('content')

    <p> Đây là phần content </p>
    <p>User Name: {{$data->username}}</p>
    <p>Name: {{$data->name}}</p>
    <p>Email: {{$data->email}}</p>

@endsection
