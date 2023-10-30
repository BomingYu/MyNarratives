<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'image|nullable'
        ]);
        
        if (request()->has('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validate['image'] = $imagePath;
        }
        else{
            $validate['image'] = null;
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

    public function gotoProfile(User $user){
        $posts = $user->posts()->paginate(5);
        return view('profilePage' , compact('user' , 'posts'));
    }

    public function profileEdit(User $user){
        $editing = true;
        $posts = $user->posts()->paginate(5);
        return view('profilePage' , compact('user' , 'editing' , 'posts'));
    }

    public function profileUpdate(User $user){
        
        $validate = request()->validate([
            'name' => 'required|min:1',
            'bio' => 'nullable|max:255',
            'image' => 'image|nullable'
        ]);

        if(request()->has('randomIcon')){
            $validate['image'] = null;
        }
        else{
            if(request()->has('image')){
                $imagePath = request()->file('image')->store('profile' , 'public');
                $validate['image'] = $imagePath;

                if($user->image){
                    Storage::disk('public')->delete($user->image);
                }
            }
            else{
                unset($validate['image']);
            }
        }
        
        //dd($validate);
        $user->update($validate);
        return redirect()->route('user.profile' , ['user'=>$user->id])->with('success' , 'Profile updated successfully!');
    }
}
