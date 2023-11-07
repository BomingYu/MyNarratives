@if (Auth::user()->id !== $user->id)
    <div class="profileCard">

        <h2>{{ $user->name }} Profile</h2>

        <div class="profileTitleDiv">
            <div class="profileSmallDiv">
                <img src="{{ $user->getImageUrl() }}" alt="avatar" class="postUserImage">
                <div>
                    <h3>{{ $user->name }}</h3>
                    <h4>{{ $user->email }}</h4>
                </div>
            </div>
            @if (auth()->id() === $user->id)
                <a href="{{ route('user.edit', $user->id) }}" class="m-3">Edit Profile</a>
            @endif
        </div>
        <hr>
        <span>
            {{ $user->bio }}
        </span>
        <div class="likeNpostCount">
            <div class="postCardUserRight">
                <img src="{{ asset('news.png') }}" alt="Posts" class="postsIcon">
                <span>{{ $user->posts()->count() }}</span>
            </div>
            {{-- <div class="postCardUserRight">
                <img src="{{ asset('heart.png') }}" alt="Likes" class="likeIcon">
                <span>{{$user->likes()->count()}}</span>
                <img src="{{ asset('unheart.png') }}" alt="Likes" class="likeIcon">
                <span>UnlikeCount</span>
            </div> --}}
        </div>
        <hr>
    </div>
@endif
