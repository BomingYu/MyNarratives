 <div class="postCard">
     <div class="postCardUser">
         <div class="postCardUserLeft">
             <img src="{{ $post->user->getImageUrl() }}" alt="{{ $post->user->name }}" class="postUserImage">
             <a href="{{ route('user.profile', $post->user->id) }}">
                 <h5>{{ $post->user->name }}</h5>
             </a>
         </div>
         <div class="postCardUserRight">
            @include('components.posts.likeNunlikeCard')
             <div class="postCardMiddle mx-3 mt-3">
                 <img src="{{ asset('comment.png') }}" alt="like" class="likeIcon">
                 <span>{{$post->comments()->count()}}</span>
             </div>
         </div>

     </div>

     <div class="postCardBody">
         <h3 class="postTitle">{{ $post->title }}</h3>
         <div class="postDetail">
             <span>{{ $post->created_at }}</span>
             <a href=" {{ route('post.show', $post->id) }} ">View</a>
             @if (auth()->id() === $post->user->id)
                 <a href=" {{ route('post.edit', $post->id) }} ">Edit</a>
                 <form method="POST" action="{{ route('post.delete', $post->id) }}">
                     @csrf
                     @method('delete')
                     <button type="submit" class="btn btn-danger">X</button>
                 </form>
             @endif

         </div>
     </div>
 </div>
