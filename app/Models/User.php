<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function userPost(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserPost::class, 'user_post_id');
    }
    public function userComment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserComment::class);
    }
}
