@foreach ($post->comments()->orderBy('created_at', 'desc')->get() as $comment)
    <div class="commentCard">
        <div class="commentTitle">
            <div class="commentUser">
                <img src="{{ $comment->user->getImageUrl() }}" alt="avatar" class="commentAvatar">
                <h5>{{ $comment->user->name }}</h5>
            </div>
            <h6>{{ $comment->created_at }}</h6>
        </div>
        <div class="commentBodyDiv">
            <p>{{ $comment->body }}</p>
        </div>
    </div>
@endforeach
