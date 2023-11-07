<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function postLike(Post $post){
        $liker = auth()->user();
        if(!($liker->liking($post))){
            $liker->likes()->attach($post->id);
            if($liker->unliking($post)){
                $liker->unlikes()->detach($post->id);
            }
        }
        else{
            $liker->likes()->detach($post->id);
        }
        return redirect()->back();
    }
}
