@extends('templates.mainPage')

@section('pageName')
    New Post
@endsection

@section('midDiv')
    <form class="postForm" action="{{ route('post.create') }}" method="POST">
        @csrf
        <input type="text" class="form-control" id="title" name="title" placeholder="Post Title">
        @error('title')
            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
        @enderror
        <textarea class="form-control" id="body" name="body" rows="5" placeholder="Post Body..."></textarea>
        @error('body')
            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
        @enderror
        <button type="submit" class="btn btn-success" >Post</button>
    </form>
@endsection
