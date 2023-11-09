<div class="rightFollowsDiv">
    <h5>Your Followers &#40;{{Auth::user()->followers()->count()}}&#41;</h5>
    <div class="followUsersContainer">
        {{-- @dump(Auth::user()->followers()->count()) --}}
        @if (Auth::user()->followers()->count() > 0)
            @foreach ($followers as $user)
                @include('components.users.followNfollowerCard')
            @endforeach
        @else
            <h5 style="color: red">You have no follower!</h5>
        @endif
        <div class="mt-3 text-sm">{{$followers->appends(Arr::except(Request::query() , 'followers'))->links()}}</div>
    </div>
</div>
