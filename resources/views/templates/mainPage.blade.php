@extends('templates.basic')

@section('pageTitle')
    @yield('pageName')
@endsection

@section('mainBody')
    <div class="mainBodyDiv">
        @include('components.leftSideBox')
        <div class="midDiv">
            @yield('midDiv')
        </div>
        @include('components.rightSideBox')
    </div>
@endsection
