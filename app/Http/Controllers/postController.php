<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{


    public function index(){
        return view('mainPage', [
            'posts' => Post::orderBy('created_at' , 'desc')->paginate(5)
        ]);
    }

    public function getPost(Post $post){
        return view('singlePostPage' , compact('post'));
    }

    public function addNewPost(){
        return view('newPost');
    }

    public function createNewPost(){
        request()->validate([
            'title'=>'required|min:5|max:100',
            'body'=>'required|min:5'
        ]);

        $post = new Post([
            'title'=>request()->get('title',''),
            'body'=>request()->get('body','')
        ]);

        $post->save();

        return redirect()->route('home')->with('success', 'Post created successfully');
    }

    public function editPost(Post $post){
        $editing = true;
        return view('singlePostPage' , compact('post' , 'editing'));
    }
    
    public function deletePost(Post $post){
        $post->delete();
        return redirect()->route('home')->with('success' , 'The Post is deleted successfully!');
    }

    public function updatePost(Post $post){
        request()->validate([
            'title'=>'required|min:5|max:100',
            'body'=>'required|min:5'
        ]);

        $post->title = request()->get('title','');
        $post->body = request()->get('body','');

        $post->save();
        return redirect()->route('home')->with('success','The post updated successfully!');
    }
}
