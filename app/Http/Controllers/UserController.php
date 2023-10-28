<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function gotoLogin()
    {
        return view('loginPage');
    }
    public function gotoSignup()
    {
        return view('signupPage');
    }
    public function store()
    {
        $validate = request()->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'bio' => 'nullable',
            'image' => 'image'
        ]);
        
        if (request()->has('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validate['image'] = $imagePath;
        }
        else{
            $validate['image'] = 'https://api.dicebear.com/6.x/fun-emoji/svg?seed=' .$validate['name'];
        }

        User::create(
            [
                'name' => $validate['name'],
                'email' => $validate['email'],
                'password' => Hash::make($validate['password']),
                'bio' => $validate['bio'],
                'image' => $validate['image'] 
            ]
        );

        return redirect()->route('user.login')->with('success' , 'Account Created Successfully!');
    }

    public function login(){
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($validated)){
            request()->session()->regenerate();
            return redirect()->route('home')->with('success','You login successully');
        }

        return redirect()->route('user.login')->withErrors(['email'=>'No matching user found or invalied password!']);
    }

    public function logout(){
        auth()->logout();
        request()->session()->regenerateToken();
        return redirect()->route('home')->with('success','Logged Out');
    }
}
