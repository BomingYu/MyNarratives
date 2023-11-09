<div class="rightFollowsDiv">
    <h5>Your Followings &#40;{{Auth::user()->follows()->count()}}&#41;</h5>
    <div class="followUsersContainer">
        @if (Auth::user()->follows()->count() > 0)
            @foreach ($follows as $user)
                @include('components.users.followNfollowerCard')
            @endforeach
        @else
        <h5 style="color: red">You are following nobody!</h5>
        @endif
        <div class="mt-3 text-sm">{{$follows->appends(Arr::except(Request::query() , 'follows'))->links()}}</div>
    </div>
</div>
