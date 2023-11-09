@auth
    <div class="leftDiv">
        <div class="myLeftCard">
            <img src="{{ Auth::user()->getImageUrl() }}" alt="{{ Auth::user()->name }}" class="myLeftCardImg">
            <h2>{{ Auth::user()->name }}</h2>
            <div class="myCardPosts mb-3">
                <img src="{{ asset('news.png') }}" alt="Posts" class="postsIcon">
                <span>{{ Auth::user()->posts()->count() }}</span>
                <img src="{{ asset('gallery.png') }}" alt="Posts" class="postsIcon">
                <span>{{ Auth::user()->posts()->count() }}</span>
                <img src="{{ asset('music.png') }}" alt="Posts" class="postsIcon">
                <span>{{ Auth::user()->posts()->count() }}</span>
            </div>
            <p class="userProfileP">{{ Auth::user()->bio }}</p>
            <a href="{{route('user.edit' , Auth::user()->id)}}" class="m-3">Edit Profile</a>
        </div>
    </div>
@endauth
