<div class="likingDiv">
    <form action="{{ route('post.like', $post->id) }}" method="POST">
        @csrf
        @auth
            @if (Auth::user()->liking($post) == true)
                <button style="background-color: orange"><img src="{{ asset('heart.png') }}" alt="like"
                        class="unlikeIcon"></button>
            @else
                <button><img src="{{ asset('heart.png') }}" alt="like" class="unlikeIcon"></button>
            @endif
        @endauth
        @guest
            <button><img src="{{ asset('heart.png') }}" alt="like" class="unlikeIcon"></button>
        @endguest
        <span>{{ $post->likes()->count() }}</span>
    </form>

    <form action="{{ route('post.unlike', $post->id) }}" method="POST">
        @csrf
        @auth
            @if (Auth::user()->unliking($post) == true)
                <button style="background-color: rgb(123, 183, 32)"><img src="{{ asset('unheart.png') }}" alt="like"
                        class="unlikeIcon"></button>
            @else
                <button><img src="{{ asset('unheart.png') }}" alt="like" class="unlikeIcon"></button>
            @endif
        @endauth
        @guest
            <button><img src="{{ asset('unheart.png') }}" alt="like" class="unlikeIcon"></button>
        @endguest
        <span>{{ $post->unlikes()->count() }}</span>
    </form>
</div>
