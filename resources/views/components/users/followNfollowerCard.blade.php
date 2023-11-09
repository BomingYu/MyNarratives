<div class="followUserDiv">
    <a href="{{route('user.profile' , $user->id)}}"><h6>{{ $user->name }}</h6></a> 
    @if (Auth::user()->theFollows($user))
        <form action="{{route('user.unfollow' , $user->id)}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Unfollow</button>
        </form>
    @else
        <form action="{{route('user.follow' , $user->id)}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-warning btn-sm">Follow</button>
        </form>
    @endif

</div>
