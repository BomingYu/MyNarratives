@extends('templates.basic')

@section('pageTitle')
    {{ $post->title }}
@endsection

@section('mainBody')
    @if ($editing ?? false)
        <form class="postForm" action="{{ route('post.update' , $post->id) }}" method="POST">
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
            <p>{{ $post->body }}</p>
            <div class="postOpDiv">
                <a href=" {{ route('post.edit' , $post->id) }} ">Edit</a>
                <form method="POST" action="{{route('post.delete' , $post->id)}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                 </form>
            </div>
            
        </div>
    @endif
@endsection
