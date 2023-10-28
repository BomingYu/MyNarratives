@extends('templates.mainPage')

@section('pageName')
    Home
@endsection

@section('midDiv')
    @include('components.successMessage')

    @if ($posts->count() > 0)
        @foreach ($posts as $post)
            @include('components.postCard')
        @endforeach
    @else
        <h5>No Post Shown</h5>
    @endif


@endsection
