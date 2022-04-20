<?php

namespace App\Models;

use http\Client\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class admin extends Model
{
    use HasFactory;

    function user(){
        return $this->belongsTo(User::class, );
    }


}
