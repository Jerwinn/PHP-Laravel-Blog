<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    function comments(){
        return $this->hasMany('App\Models\Comment')->orderBy('id','desc');
    }

    function category(){
        return $this->belongsTo(PostCategory::class, 'cat_id');
    }

    //public function post()
    //{
    ////    return $this->belongsTo(User::class);
    //}

   // public function comments()
   // {
    //    return $this->belongsToMany(Comment::class);
   // }

}
