@auth
    @if (Auth::user()->theFollows($user) == true)
        <form action="{{ route('user.unfollow', $user->id) }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger">Unfollow</button>
        </form>
    @else
        <form action="{{ route('user.follow', $user->id) }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-warning">Follow</button>
        </form>
    @endif
@endauth
