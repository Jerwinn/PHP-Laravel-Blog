<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    use HasFactory;

    public function userPost(){
        return $this->belongsToMany(UserPost::class, 'user_comment_user_post','user_comment_id', 'user_post_id');
    }
}
