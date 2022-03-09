<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    use HasFactory;

    public function userPost(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userComments(){
        return $this->belongsToMany(UserComment::class,'user_comment_user_post','user_post_id','user_comment_id');
    }

}
