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
        return view('viewPostPage');
    }

    public function addNewPost(){
        return view('newPost');
    }

    public function createNewPost(Request $request){
        $request->validate([
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
    
}
