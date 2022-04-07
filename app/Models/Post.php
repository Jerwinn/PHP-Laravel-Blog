<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }

}
