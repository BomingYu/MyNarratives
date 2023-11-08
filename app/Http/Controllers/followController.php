<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class followController extends Controller
{
    public function followUser(User $user){
        $follower = auth()->user();
        $follower->follows()->attach($user->id);
        return back()->with('success' , 'You are following '.$user->name.' now.');
    }

    public function unfollowUser(User $user){
        $follower = auth()->user();
        $follower->follows()->detach($user->id);
        return back()->with('success' , 'You unfollow '.$user->name.'.');
    }
}
