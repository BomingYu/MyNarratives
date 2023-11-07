<a href="#"><img src="{{ asset('heart.png') }}" alt="like" class="unlikeIcon"></a>
<span>{{$post->likes()->count()}}</span>
<a href="#"><img src="{{ asset('unheart.png') }}" alt="like" class="unlikeIcon"></a>
<span>{{$post->unlikes()->count()}}</span>