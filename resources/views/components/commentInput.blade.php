@auth
    <div>
        <form class="postForm" action="{{ route('comment.add', $post->id) }}" method="POST">
            @csrf
            <textarea class="form-control" name="body" rows="3" placeholder="Comment..."></textarea>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endauth
@guest
    <h3 class="warningMessage">Login to comment.</h3>
@endguest

<hr>
