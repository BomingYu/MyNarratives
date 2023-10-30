@extends('templates.mainPage')

@section('pageName')
    {{ $post->title }}
@endsection

@section('midDiv')
    @include('components.successMessage')
    @if ($editing ?? false)
        <form class="postForm" action="{{ route('post.update', $post->id) }}" method="POST">
            @csrf
            @method('put')
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            @error('title')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
            @enderror
            <textarea class="form-control" id="body" name="body" rows="5">{{ $post->body }}</textarea>
            @error('body')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
            @enderror
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    @else
        <div class="viewPostDiv">
            <h2>{{ $post->title }}</h2>
            <div class="singlePostUser">
                <img src="{{ $post->user->getImageUrl() }}" alt="{{ $post->user->name }}" class="postUserImage">
                <label>{{ $post->user->name }}</label>
            </div>
            <p>{{ $post->body }}</p>
            @if (auth()->id() === $post->user->id)
                <div class="postOpDiv">
                    <a href=" {{ route('post.edit', $post->id) }} ">Edit</a>
                    <form method="POST" action="{{ route('post.delete', $post->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endif
            <div class="mt-3">
                <a href="#"><img src="{{ asset('heart.png') }}" alt="like" class="likeIcon"></a>
                <span>likeCount</span>
            </div>
        </div>
    @endif
    <hr>
    @include('components.commentInput')
    @include('components.commentCard')
@endsection
