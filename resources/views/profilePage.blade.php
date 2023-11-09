@extends('templates.mainPage')

@section('pageName')
    Profile
@endsection

@section('leftSIdeBox')
    @if (Auth::user()->id === $user->id)
        @include('components.sideBars.myLeftBar')
    @else
        @include('components.sideBars.otherUserLeftBar')
    @endif
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
        <div class="mt-3">{{$posts->appends(Arr::except(Request::query() , 'posts'))->links()}}</div>
    @endif
@endsection

@section('rightSideBox')
    @if (Auth::user()->id === $user->id)
        @include('components.sideBars.myRightBar')
    @else
        @include('components.sideBars.otherUserRightBar')
    @endif
@endsection
