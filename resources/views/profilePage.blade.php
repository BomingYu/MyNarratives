@extends('templates.mainPage')

@section('pageName')
    Profile
@endsection

@section('midDiv')
    @include('components.successMessage')
    @if ($editing ?? false)
        @include('components.users.userUpdateForm')
    @else
        @include('components.users.userProfileCard')
        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                @include('components.posts.postCard')
            @endforeach
        @else
            <h5 class="warningMessage">{{ $user->name }} has no post.</h5>
        @endif
    @endif


@endsection
