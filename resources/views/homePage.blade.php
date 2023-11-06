@extends('templates.mainPage')

@section('pageName')
    Home
@endsection

@section('leftSIdeBox')
    @include('components.sideBars.myLeftBar')
@endsection

@section('midDiv')
    @include('components.successMessage')
    @if ($posts->count() > 0)
        @foreach ($posts as $post)
            @include('components.posts.postCard')
        @endforeach
    @else
        <h5 class="warningMessage">No Post Shown</h5>
    @endif
@endsection

@section('rightSideBox')
    @include('components.sideBars.myRightBar')
@endsection
