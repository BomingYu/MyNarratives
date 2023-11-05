@extends('templates.mainPage')

@section('pageName')
    Login
@endsection

@section('midDiv')
    @include('components.successMessage')
    @include('components.users.loginComponent')
@endsection
