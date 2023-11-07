<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UnlikeController extends Controller
{
    public function postUnlike(Post $post){
        $unliker = auth()->user();
        //dd($unliker->unliking($post));
        if(!($unliker->unliking($post))){
            $unliker->unlikes()->attach($post->id);
            if($unliker->liking($post)){
                $unliker->likes()->detach($post->id);
            }
        }
        else{
            $unliker->unlikes()->detach($post->id);
        }
        return redirect()->back();
    }
}
