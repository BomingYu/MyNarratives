@extends('templates.basic')

@section('pageTitle')
    @yield('pageName')
@endsection

@section('mainBody')
    <div class="mainBodyDiv">
        @yield('leftSIdeBox')
        <div class="midDiv">
            @yield('midDiv')
        </div>
        @yield('rightSideBox')
    </div>
@endsection
