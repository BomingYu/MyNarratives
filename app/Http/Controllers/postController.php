<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class postController extends Controller
{


    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate($perPage = 5, $columns = ['*'], $pageName = 'posts');
        if (auth()->user()) {
            $follows = auth()->user()->follows()->paginate($perPage = 10, $columns = ['*'], $pageName = 'follows');
            $followers = auth()->user()->followers()->paginate($perPage = 10, $columns = ['*'], $pageName = 'followers');
            return view('homePage', compact('posts', 'follows' , 'followers'));
        }
        return view('homePage', compact('posts'));
    }

    public function getPost(Post $post)
    {
        return view('singlePostPage', compact('post'));
    }

    public function addNewPost()
    {
        return view('newPost');
    }

    public function createNewPost()
    {
        request()->validate([
            'title' => 'required|min:5|max:100',
            'body' => 'required|min:5'
        ]);

        $post = new Post([
            'user_id' => auth()->user()->id,
            'title' => request()->get('title', ''),
            'body' => request()->get('body', ''),
        ]);
        //dd($post);
        $post->save();

        return redirect()->route('home')->with('success', 'Post created successfully');
    }

    public function editPost(Post $post)
    {
        $editing = true;
        return view('singlePostPage', compact('post', 'editing'));
    }

    public function deletePost(Post $post)
    {
        $post->delete();
        return redirect()->route('home')->with('success', 'The Post is deleted successfully!');
    }

    public function updatePost(Post $post)
    {
        request()->validate([
            'title' => 'required|min:5|max:100',
            'body' => 'required|min:5'
        ]);

        $post->title = request()->get('title', '');
        $post->body = request()->get('body', '');

        $post->save();
        return redirect()->route('home')->with('success', 'The post updated successfully!');
    }

    public function getMyPosts(User $user)
    {
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate($perPage = 5, $columns = ['*'], $pageName = 'posts');
        $follows = auth()->user()->follows()->paginate($perPage = 10, $columns = ['*'], $pageName = 'follows');
        $followers = auth()->user()->followers()->paginate($perPage = 10, $columns = ['*'], $pageName = 'followers');
        return view('homePage', compact('posts', 'follows' , 'followers'));
    }
}
