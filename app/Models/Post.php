<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        "title",
        "body",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class , 'posts_likes')->withTimestamps();
    }
    public function unlikes(){
        return $this->belongsToMany(USer::class , 'posts_unlikes')->withTimestamps();
    }
    
}
