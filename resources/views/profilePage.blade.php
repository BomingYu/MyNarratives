@extends('templates.mainPage')

@section('pageName')
    Profile
@endsection

@section('midDiv')
    @include('components.successMessage')
    @if ($editing ?? false)
        @include('components.userUpdateForm')
    @else
        @include('components.userProfileCard')
        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                @include('components.postCard')
            @endforeach
        @else
            <h5 class="warningMessage">{{ $user->name }} has no post.</h5>
        @endif
    @endif


@endsection
