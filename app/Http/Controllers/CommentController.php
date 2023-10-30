<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post){
        request()->validate([
            'body'=>'required|min:3'
        ]);

        $comment = new Comment();

        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post->id;
        $comment->body = request()->get('body');

        $comment->save();

        return redirect()->back()->with('success' , 'Comment successfully');
    }
}
